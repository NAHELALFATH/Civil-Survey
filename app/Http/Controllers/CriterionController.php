<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criterion;
use App\Type;

class CriterionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Type $type)
    {
        $respondent_type = $type->respondent_type;
        $type->load('criteria');
        return view('criteria.index', compact('type', 'respondent_type'));
    }
    
    public function create()
    {
    }
    
    public function store()
    {   
    }
    
    public function edit(Criterion $criterion)
    {
    }
    
    public function update(Criterion $criterion)
    {
    }
    
    public function delete(Criterion $criterion)
    {
        $criterion->delete();
        return back();
    }
}
