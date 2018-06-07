<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name','slug','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    function friendsOfMine()
    {
      return $this->belongsToMany(User::class, 'friend_user', 'user_id', 'friend_id')
         ; // or to fetch confirmed value
    }

    function friendOf()
    {
      return $this->belongsToMany(User::class, 'friend_user', 'friend_id', 'user_id')
         ;
    }

    // accessor allowing you call $user->friends
    public function getFriendsAttribute()
    {
        if ( ! array_key_exists('friends', $this->relations))
        {
            $this->loadFriends();        
        } 

        return $this->getRelation('friends');
    }

    public function loadFriends()
    {
        if ( ! array_key_exists('friends', $this->relations))
        {
            $friends = $this->friends();

            $this->setRelation('friends', $friends);
        }
    }

    public function friends()
    {
        return $this->friendsOfMine()
                    ->wherePivot('confirmed', true) // to filter only confirmed
                    ->withPivot('confirmed')
                    ->get()
                    ->merge($this->friendOf()->wherePivot('confirmed', true)->withPivot('confirmed')->get());
    }

    public function friendRequests()
    {
        return $this->friendsOfMine()
                    ->wherePivot('confirmed',false)
                    ->withPivot('confirmed');
    }
    
    public function friendRequestsPending()
    {
        return $this->friendOf()
                    ->wherePivot('confirmed',false)
                    ->withPivot('confirmed');
    }

    public function hasFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestsPending()->where('id',$user->id)->count();
    }

    public function hasFriendRequestRecieved(User $user)
    {
        return (bool) $this->friendRequests()->where('id',$user->id)->count();
    }
    
    public function isFriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id',$user->id)->count();
    }
    
    public function addFriend(User $user)
    {
        return $this->friendOf()->attach($user->id);
    }

    public function acceptFriendRequest(User $user)
    {
        return $this->friendRequests()->where('id',$user->id)->first()->pivot->update([
            'confirmed' => true,
        ]);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
        $post->tags()->sync(request('tags'));
    }

    public function scopeSearch($query,$s)
    {
        return $query->where('name','like',"%{$s}%");
    }

    public function isLiked()
    {
        
    }
}
// user id sent the request
// friend id who got the request 

