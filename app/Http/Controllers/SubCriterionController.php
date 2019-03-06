<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criterion;
use App\SubCriterion;
use Illuminate\Validation\Rule;

class SubCriterionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Criterion $criterion)
    {
        $criterion->load(["type"]);
        $criterion->load(["sub_criteria" => function ($query) {
            $query->select("id", "criterion_id", "name");
            $query->withCount("alternatives");
        }]);

        $respondent_type = $criterion->type->respondent_type;
        return view('sub_criterion.index', compact('criterion', 'respondent_type'));
    }
    
    public function create(Criterion $criterion)
    {
        $respondent_type = $criterion->type->respondent_type;
        return view("sub_criterion.create", compact('criterion', 'respondent_type'));
    }
    
    public function store(Criterion $criterion)
    {
        $data = $this->validate(request(), [
            "name" => "required|string|unique:sub_criteria"
        ]);

        SubCriterion::create([
            "criterion_id" => $criterion->id,
            "name" => $data["name"]
        ]);

        return redirect()
            ->route("master.sub-criterion.index", $criterion)
            ->with("message_state", "success")
            ->with("message", __("messages.create.success"));
    }
    
    public function edit(SubCriterion $sub_criterion)
    {
        $respondent_type = $sub_criterion->criterion->type->respondent_type;
        return view("sub_criterion.edit", compact("respondent_type", "sub_criterion"));
    }
    
    public function update(SubCriterion $sub_criterion)
    {
        $data = $this->validate(request(), [
            "name" => ["required", "string", Rule::unique("sub_criteria")->ignore($sub_criterion)]
        ]);

        $sub_criterion->update($data);

        return back()
            ->with("message_state", "success")
            ->with("message", __("messages.update.success"));
    }
    
    public function delete(SubCriterion $sub_criterion) {
        $sub_criterion->delete();
        return back()
            ->with("message_state", "success")
            ->with("message", __("messages.delete.success"));
    }
}
