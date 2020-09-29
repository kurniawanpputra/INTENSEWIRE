<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Profile;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('asdasd')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/def.jpg',
            'about' => 'No description.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);

        Session::flash('success', 'New user added successfully.');

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user_profile = $user->profile;

        if($user->id == Auth::user()->id){
            Session::flash('error', 'You can\'t remove your own account.');

            return redirect()->back();
        }

        $user->delete();
        $user_profile->delete();

        Session::flash('success', 'User removed successfully.');

        return redirect()->back();
    }

    public function makeAdmin($id){
        $user = User::find($id);

        if($user->admin){
            Session::flash('error', 'User already granted super admin privileges.');

            return redirect()->back();
        }

        $user->admin = 1;
        $user->save();

        Session::flash('success', 'User granted super admin privileges successfully.');

        return redirect()->back();
    }

    public function removeAdmin($id){
        $user = User::find($id);

        if($user->id == Auth::user()->id){
            Session::flash('error', 'You can\'t remove your own privileges.');

            return redirect()->back();
        }

        $user->admin = 0;
        $user->save();

        Session::flash('success', 'User super admin privileges removed successfully.');

        return redirect()->back();
    }
}
