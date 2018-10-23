<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(Request $request)
    {        
        $counter = array ();
        $groups = \App\Group::get();
        $items = \App\Item::get();
        $students = \App\Student::get();
        foreach ($groups as $group){
            $counter[$group->name] = 0;
            foreach($group->students()->get() as $stud){
                $counter[$group->name] += count($stud->ratings()->get());
            }
        }

        $ratings = \App\Rating::get();
        return view('rating', ['students' => $students, 'ratings' => $ratings, 'groups' => $groups, 'counter' => $counter, 'items' => $items]);
    }

    public function addRating(Request $request)
    {
        $this->validate($request, [
            'assessment' => 'required',
            'item_id' => 'required',
            'student_id' => 'required',
        ]);

        \App\Rating::create($request->all());     

        return redirect('/rati');    
    }

    public function destroyItem(Request $request)
    {
        \App\Rating::where('id', '=', $request->id)->delete();

        return redirect('/rati');    
    }

    public function transformItem(Request $request)
    {
        $this->validate($request, [
            'assessment' => 'required',
            'item_id' => 'required',
            'student_id' => 'required',
        ]);

        \App\Rating::findOrFail($request->id)->update($request->all());

        return redirect('/rati');       
    }
}
