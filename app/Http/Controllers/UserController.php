<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('admin.users.create');
    }
    public function home(){
        $users = User::all(); 
        return view('admin.users.home', compact('users'));
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'birthdate' => 'required|date',
        'phone_number' => 'nullable|string|max:8',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
    ]);

    $avatarName = null;
    if ($request->hasFile('avatar')) {
        $avatarName = time().'.'.$request->avatar->extension();
        $request->avatar->move(public_path('avatars'), $avatarName);
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'birthdate' => $request->birthdate,
        'phone_number' => $request->phone_number,
        'avatar' => $avatarName,
    ]);

    return redirect()->route('admin.users.home')->with('success', 'User created successfully');
}
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Handle the form submission and update the user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'birthdate' => 'required|date',
            'phone_number' => 'nullable|string|max:8',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
    
        $data = $request->only(['name', 'email', 'birthdate', 'phone_number']);
    
        if ($request->hasFile('avatar')) {
            $avatarName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $data['avatar'] = $avatarName;
        }
    
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
    
        $user->update($data);
    
        return redirect()->route('admin.users.home')->with('success', 'User updated successfully');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.home')->with('success', 'User deleted successfully');
    }
}
