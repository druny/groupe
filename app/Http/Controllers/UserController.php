<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RegistersUsers;


class UserController extends Controller
{

    protected $redirectTo = '/home';

    public function index()
    {
        $users = User::get();
        return view('users.all', ['users' => $users]);
        
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|',
        ]);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('user.create');
    }



    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $user = User::id($id);
        if ($user) {
            $user->delete();
            return redirect()->route('user.all');
        }
            echo 'Not found';
    }
    public function all() {
        $users = User::get();
        return view('users.all', ['users' => $users]);
      
    }

}

