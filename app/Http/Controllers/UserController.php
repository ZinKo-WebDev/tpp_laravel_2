<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        $roles = Role::pluck('name','name')->all();
        return view('role-permission.user.index', compact(['users', 'roles']));
    }

    public function create(){

    }

    public function store(UserRequest $request){
            $user = User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password)
            ]);
            $user->syncRoles($request->roles);

            return redirect('/users')->with('success', 'User Created Successfully');
    }
    public function edit(User $user){
//        return $user;
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit', compact(['user','roles','userRole']));
    }
    public function update(Request $request, User $user){
        $request->validate([
           'name' => 'required|string|max:255',
           'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if(!empty($request->password)){
            $data += ['password' => Hash::make($request->password)];
        }
        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('success', 'User Updated Successfully with that roles');
    }
    public function destroy($userID){
        $user = User::findOrFail($userID);
        $user->delete();
        return redirect('/users')->with('success', 'User Deleted Successfully');
    }

}
