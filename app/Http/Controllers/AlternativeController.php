<?php

namespace App\Http\Controllers;

use App\SubCriterion;


class AlternativeController extends Controller
{
    public function index(SubCriterion $sub_criterion)
    {
        $sub_criterion->load("criterion.type");
        $respondent_type = $sub_criterion->criterion->type->respondent_type;
        return view("alternative.index", compact("respondent_type", "sub_criterion"));
    }
    
    public function create(SubCriterion $sub_criterion)
    {
        $respondent_type = $sub_criterion->criterion->type->respondent_type;
        return view("alternative.create", compact("respondent_type", "sub_criterion"));
    }
    
    public function store()
    {
    }
    
    public function edit(Alternative $alternative)
    {
    }
    
    public function update(Alternative $alternative)
    {
    }
    
    public function delete(Alternative $alternative) {
    }
}
