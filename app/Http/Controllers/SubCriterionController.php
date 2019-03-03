<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criterion;
use App\SubCriterion;

class SubCriterionController extends Controller
{
    public function index(Criterion $criterion)
    {
        $criterion->load('sub_criteria');
        $criterion->load('type');
        $respondent_type = $criterion->type->respondent_type;
        return view('sub_criterion.index', compact('criterion', 'respondent_type'));
    }
    
    public function create()
    {
    }
    
    public function store()
    {   
    }
    
    public function edit(SubCriterion $sub_criterion)
    {
    }
    
    public function update(SubCriterion $sub_criterion)
    {
    }
    
    public function delete(SubCriterion $sub_criterion) {
    }
}
