<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function assignAdminRole()
    // {
    //     $adminRole = Role::where('name', 'admin')->first(); // Retrieve the admin role
    //     $user = User::find(1); // Retrieve the user by ID or any other method

    //     $user->roles()->attach($adminRole);

    //     // Optionally, you can add a success message or perform any other actions
    //     return redirect()->back()->with('success', 'Admin role assigned successfully.');
    // }

 

 

    public function index()
    {
     $users=User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();

        return view('admin.users.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'sex' => 'required',
            'country' => 'required',
            'subscription' => 'required',
            'active_status' => 'required',
            'roles' => 'required|array',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->roles()->attach($data['roles']);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    

       
       



    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
    
        // Validate the input fields
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'sex' => 'required',
            'country' => 'required',
            'subscribed' => 'required',
            'active_status' => 'required',
            'registered' => 'required',
            // Add validation rules for other fields
        ]);
    
        // Update the user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->sex = $request->input('sex');
        $user->country = $request->input('country');
        $user->subscribed = $request->input('subscribed');
        $user->active_status = $request->input('active_status');
        $user->registered = $request->input('registered');



   
       
        // Update other fields as needed
        $user->save();
    
        // Redirect back to the edit page with a success message
        return redirect()->route('admin.users.index', ['user' => $user])->with('success', 'User updated successfully');
    }
    
















    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
