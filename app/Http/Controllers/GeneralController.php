<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CastomClasses\studInfo;

class GeneralController extends Controller
{
    public function index(Request $request)
    {       
        $groups = \App\Group::get();

        return view('general', ['show' => false, 'groups' => $groups,]); 
    }

    public function getSummory(Request $request)
    {       
        $this->validate($request, [
            'id' => 'required',
        ]);

        $groups = \App\Group::get();
        $chooseGroup = null;
        foreach ($groups as $group){
            if ($group->id == $request->id){
                $chooseGroup = $group;
            }               
        }
        
        $students = studInfo::getStudInfoGroup($chooseGroup);

        return view('general', ['show' => true, 'groups' => $groups, 'chooseGroup' => $chooseGroup, 'students' => $students,]); 
    }
}
