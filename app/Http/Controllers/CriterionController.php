<?php

namespace App\Http\Controllers;

use App\Criterion;
use App\Type;
use Illuminate\Validation\Rule;

class CriterionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Type $type)
    {
        $respondent_type = $type->respondent_type;
        
        $type->load(["criteria" => function ($query) {
            $query->withCount("sub_criteria");
        }]);

        return view('criteria.index', compact('type', 'respondent_type'));
    }
    
    public function create(Type $type)
    {
        $respondent_type = $type->respondent_type;
        return view('criteria.create', compact('respondent_type', 'type'));
    }
    
    public function store(Type $type)
    {
        $data = $this->validate(request(), [
            "name" => "required|string|unique:criteria"
        ]);

        Criterion::create([
            "type_id" => $type->id,
            "name" => $data["name"]
        ]);

        return redirect()
            ->route("master.criterion.index", $type)
            ->with("message_state", "success")
            ->with("message", "messages.create.success");
    }
    
    public function edit(Criterion $criterion)
    {
        $respondent_type = $criterion->type->respondent_type;
        return view('criteria.edit', compact('criterion', 'respondent_type'));
    }
    
    public function update(Criterion $criterion)
    {
        $data = $this->validate(request(), [
            "name" => "required|string|unique:criteria"
        ]);
    }
    
    public function delete(Criterion $criterion)
    {
        $criterion->delete();
        return back()
            ->with("message_state", "success")
            ->with("message", "messages.delete.success");
    }
}
