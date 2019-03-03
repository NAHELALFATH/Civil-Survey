<?php

namespace App\Http\Controllers;

use App\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::query()
            ->select('id', 'name')
            ->get();

        return view('type.index', compact('types'));
    }
    
    public function create()
    {
    }
    
    public function store()
    {   
    }
    
    public function edit(Type $type)
    {
    }
    
    public function update(Type $type)
    {
    }
    
    public function delete(Type $type) {
        $type->delete();
        return back();
    }
}
