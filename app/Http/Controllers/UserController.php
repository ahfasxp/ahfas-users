<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            're-password' => 'required|string|same:password',
            'avatar' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        
        $user = new User;
        $avatar = $user->avatar;
        if($request->file('avatar')){
            $avatar = $request->file('avatar')->store('users', 'public');
        }
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = \Hash::make($request->get('password'));
        $user->avatar = $avatar;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'email' => 'required|string|min:5|max:100',
            're-password' => 'same:password',
            'avatar' => 'nullable|mimes:jpg,png,jpeg',
            'address' => 'required|string|min:5|max:100',
            'phone' => 'required|string|min:5|max:100',
            'about' => 'required|string|min:5',
            'github' => 'required|string|min:5|max:100',
            'instagram' => 'required|string|min:5|max:100',
            'facebook' => 'required|string|min:5|max:100',
            'interest' => 'required|string|min:5',
        ]);
        
        $user = User::findOrFail($id);
        $avatar = $user->avatar;
        if($request->file('avatar')){                
            if($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))){         
                \Storage::delete('public/' . $user->avatar);         
            }
            $avatar = $request->file('avatar')->store('users', 'public');
        }
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->about = $request->get('about');
        $user->github = $request->get('github');
        $user->instagram = $request->get('instagram');
        $user->facebook = $request->get('facebook');
        $user->interest = $request->get('interest');
        if($request->get('password')){
            $user->password = \Hash::make($request->get('password'));
        }
        $user->avatar = $avatar;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))){         
            \Storage::delete('public/' . $user->avatar);         
        }
        $user->delete();
        return redirect()->route('users.index');
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('users.profile', compact('user'));
    }
}
