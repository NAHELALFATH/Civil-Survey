<?php

namespace App\Http\Controllers;

use App\Type;
use App\Enums\RespondentType;

class TypeController extends Controller
{
    public function index()
    {
        $respondent_types = RespondentType::toArray();
        $respondent_type = request("respondent_type");

        if (empty($respondent_type) || !in_array(request("respondent_type"), $respondent_types)) {
            $respondent_type = collect($respondent_types)->first();
        }

        $types = Type::query()
            ->where('respondent_type', $respondent_type)
            ->select('id', 'name')
            ->get();

        return view('type.index', compact('types', 'respondent_type'));
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
