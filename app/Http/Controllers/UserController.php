<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use RegistersUsers;


class UserController extends Controller
{

    protected $redirectTo = '/';

    public function index()
    {
        $users = User::get();
        return view('user.all', ['users' => $users]);
        
    }


    public function create()
    {

        $groups = Group::all();
        return view('user.create', ['groups' => $groups]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|',
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $user->groups()->attach($request['group']);

        return redirect()->route('user.create');
    }



    public function edit($id)
    {
        $user = User::id($id);
        $groups = Group::all();
        $group = $user->groups;
        return view('user.update', [
            'user' => $user,
            'groups' => $groups,

        ]);
    }


    public function update(Request $request, $id)
    {
       $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,id,' . $id,
            'password' => 'min:6|',

        ]);

        $user = User::id($id);
        $user->name = $request['name'];
        $user->second_name = $request['second_name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->cellphone = $request['cellphone'];
        $user->password =  bcrypt($request['password']);
        $user->groups()->attach($request['group']);
        $user->save();

        return redirect()->route('user.edit', $id);
    }


    public function destroy($id)
    {
        $user = User::id($id);
        if ($user) {
            $user->groups()->detach();
            $user->delete();
            return redirect()->route('user.all');
        }
            echo 'Not found';
    }
    public function all() {
        $users = User::get();
        return view('user.all', ['users' => $users]);
      
    }

}

