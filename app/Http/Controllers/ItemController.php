<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = \App\Item::get();        
        return view('item', ['items' => $items,]);;
    }

    public function addItem(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:255'
        ]);

        \App\Item::create(['name' => $request->name,]);     

        return redirect('/ite');    
    }

    public function destroyItem(Request $request)
    {
        \App\Item::where('id', '=', $request->id)->delete();

        return redirect('/ite');    
    }

    public function transformItem(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:255',
        ]);

        \App\Item::findOrFail($request->id)->update($request->all());

        return redirect('/ite');       
    }
}
