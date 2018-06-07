<?php

namespace App\Http\Controllers;

use Hash;
use Validator;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserProfile;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function search()
    {

        // return dd('ggez');
        $users = User::search(request('query'))->get();

        return view('search.results',compact('users'));
    }

    public function show_profile(User $user)
    {
        $posts = Post::where('user_id',$user->id)->get();

        return view('users.profile',compact('user','posts'));
    }

    public function settings(User $user)
    {
    	return view('users.settings',compact('user'));
    }

    public function update(User $user,UpdateUserProfile $request)
    {

        if ($request->hasFile('image')) {

            $file_name = $user->id.'_'.time().'.'.$request->image->getClientOriginalExtension();
            
            $path = Storage::putFileAs('avatars', $request->file('image'),$file_name);

            $oldImage = $user->image;
            
            if(!empty($oldImage)){
                Storage::delete("avatars/".$oldImage);
            }

            $user->image = $file_name;
            $user->save();
        }

    	$user->update([
            'name' => request('name'),
            'slug' => str_slug(request('name'),'-'),
    		'email' => request('email'),
    	]);

    	return redirect()->route('profile', [$user])->with('success','Updated Successfuly');
    }

    public function update_password(User $user)
    {

        $this->validate(request(),[
            'password' => 'required|min:6|confirmed'
        ]);

        if (!Hash::check(request('current_password'), $user->password)) {

            return back()->withErrors(["Current password field does not match your current one"]);

        }

        $user->update([
            'password' => Hash::make(request('password')),
        ]);

        return back()->with('success','Updated Successfuly');

    }
}
