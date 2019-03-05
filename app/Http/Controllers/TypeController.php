<?php

namespace App\Http\Controllers;

use App\Type;
use App\Enums\RespondentType;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRespondentType()
    {
        $respondent_types = RespondentType::toArray();
        $respondent_type = request("respondent_type");

        if (empty($respondent_type) || !in_array(request("respondent_type"), $respondent_types)) {
            $respondent_type = collect($respondent_types)->first();
        };

        return $respondent_type;
    }

    public function index()
    {
        $respondent_type = $this->getRespondentType();

        $types = Type::query()
            ->select('id', 'name')
            ->withCount('criteria')
            ->where('respondent_type', $respondent_type)
            ->get();

        return view('type.index', compact('types', 'respondent_type'));
    }
    
    public function create()
    {
        $respondent_type = $this->getRespondentType();
        return view('type.create', compact('respondent_type'));
    }
    
    public function store()
    {
        $data = $this->validate(request(), [
            "name" => "required|string"
        ]);

        $data["respondent_type"] = $this->getRespondentType();

        Type::create($data);
        
        return redirect()
            ->route("master.type.index", ["respondent_type" => $data["respondent_type"]])
            ->with("message_state", "success")
            ->with("message", __("messages.create.success"));
    }
    
    public function edit(Type $type)
    {
        $respondent_type = $type->respondent_type;
        return view('type.edit', compact('respondent_type', 'type'));
    }
    
    public function update(Type $type)
    {
        $data = $this->validate(request(), [
            "name" => "required|string"
        ]);

        $type->update($data);

        return redirect()
            ->route("master.type.index", ["respondent_type" => $this->getRespondentType()])
            ->with("message_state", "success")
            ->with("message", __("messages.update.success"));
    }
    
    public function delete(Type $type) {
        $type->delete();
        return back()
            ->with("message_state", "success")
            ->with("message", __("messages.delete.success"));
    }
}
