<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    //
    public function show(User $user)
    {
    	return view('users.profile',compact('user'));
    }

    public function add(User $user)
    {
        auth()->user()->addFriend($user);

        return back()->with('status','Added Successfuly');
    }
    
    public function accept(User $user)
    {

        auth()->user()->acceptFriendRequest($user);

        return back()->with('success','Accepted!');
    }
    
    public function decline_unfriend(User $user)
    {

    }

    public function remove(User $user)
    {
        // auth()->user()->remove()
    	// $user->friends()->detach(auth()->user()->id);

    }
}
