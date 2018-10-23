<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = \App\Group::get();        
        return view('group', ['groups' => $groups,]);
    }

    public function addGroup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:255',
            'description' => 'required|min:5|max:255',
        ]);

        \App\Group::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);     

        return redirect('/gro');    
    }

    public function destroyGroup(Request $request)
    {
        \App\Group::where('id', '=', $request->id)->delete();

        return redirect('/gro');    
    }

    public function transformGroup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:255',
            'description' => 'required|min:5|max:255',
        ]);

        \App\Group::findOrFail($request->id)->update($request->all());

        return redirect('/gro');       
    }
}
