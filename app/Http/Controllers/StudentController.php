<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = \App\Student::get(); 
        $groups = \App\Group::get();

        return view('student', ['students' => $students, 'groups' => $groups,]);;
    }

    public function addStudent(Request $request)
    {
        $this->validate($request, [
            'group_id' => 'required',
            'name' => 'required|min:1|max:255',
            'surname' => 'required|min:1|max:255',
            'patronymic' => 'required|min:1|max:255',
            'date' => 'required',
        ]);
        
        \App\Student::create($request->all());     

        return redirect('/stud');    
    }

    public function destroyStudent(Request $request)
    {
        \App\Student::where('id', '=', $request->id)->delete();

        return redirect('/stud');    
    }

    public function transformStudent(Request $request)
    {
        $this->validate($request, [
            'group_id' => 'required',
            'name' => 'required|min:1|max:255',
            'surname' => 'required|min:1|max:255',
            'patronymic' => 'required|min:1|max:255',
            'date' => 'required',
        ]);

        \App\Student::findOrFail($request->id)->update($request->all());

        return redirect('/stud');       
    }
}
