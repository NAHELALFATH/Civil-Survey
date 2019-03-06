<?php

namespace App\Http\Controllers;

use App\SubCriterion;
use App\Alternative;
use Illuminate\Validation\Rule;

class AlternativeController extends Controller
{
    public function index(SubCriterion $sub_criterion)
    {
        $sub_criterion->load(["criterion.type"]);
        $sub_criterion->load(["alternatives" => function ($query) {
            $query->select("id", "name", "sub_criterion_id");
            $query->withCount("survey_datas");
        }]);

        $respondent_type = $sub_criterion->criterion->type->respondent_type;
        return view("alternative.index", compact("respondent_type", "sub_criterion"));
    }
    
    public function create(SubCriterion $sub_criterion)
    {
        $respondent_type = $sub_criterion->criterion->type->respondent_type;
        return view("alternative.create", compact("respondent_type", "sub_criterion"));
    }
    
    public function store(SubCriterion $sub_criterion)
    {
        $data = $this->validate(request(), [
            "name" => "required"
        ]);

        Alternative::create([
            "sub_criterion_id" => $sub_criterion->id,
            "name" => $data["name"],
        ]);

        return back()
            ->with("message_state", "success")
            ->with("message", __("messages.create.success"));
    }
    
    public function edit(Alternative $alternative)
    {
        $respondent_type = $alternative->sub_criterion->criterion->type->respondent_type;
        $sub_criterion = $alternative->sub_criterion;

        return view("alternative.edit", compact("alternative", "sub_criterion", "respondent_type"));
    }
    
    public function update(Alternative $alternative)
    {
        $data = $this->validate(request(), [
            "name" => ["required", "string"]
        ]);

        $alternative->update($data);
        return back()
            ->with("message_state", "success")
            ->with("message", __("messages.update.success"));
    }
    
    public function delete(Alternative $alternative) {
        $alternative->delete();
        return back()
            ->with("message_state", "success")
            ->with("message", __("messages.delete.success"));
    }
}
