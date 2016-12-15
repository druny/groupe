<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::get();
        return view('group.all', ['groups' => $groups]);

    }


    public function create()
    {
        return view('group.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:2505|',
        ]);

        $group = new Group;
        $group->name = $request['name'];
        $group->description = $request['description'];
        $group->role = $request['role'];
        $group->save();
        return redirect()->route('group.create');
    }



    public function edit($id)
    {
        $group = Group::id($id);

        return view('group.update', ['group' => $group]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:2505|',
        ]);

        $group = Group::id($id);
        $group->name = $request['name'];
        $group->description = $request['description'];
        $group->role = $request['role'];
        $group->save();

        return redirect()->route('group.edit', $id);
    }


    public function destroy($id)
    {
        $group = Group::id($id);
        if ($group) {
            $group->users()->detach();
            $group->delete();
            return redirect()->route('group.all');
        }
        echo 'Not found';
    }
    public function users($id) {
        $group = Group::id($id);
        $users = $group->users;

        return view('group.show', [
            'group' => $group,
            'users' => $users,
        ]);
    }
    public function all() {
        $groups = Group::get();
        return view('group.all', ['groups' => $groups]);

    }
}
