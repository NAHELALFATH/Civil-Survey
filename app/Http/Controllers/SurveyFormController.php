<?php

namespace App\Http\Controllers;

use App\Type;

class SurveyFormController extends Controller
{
    public function show()
    {
        $types = Type::query()
            ->select('id', 'name')
            ->with([
                'criteria:id,name,type_id',
                'criteria.sub_criteria:id,name,criterion_id',
                'criteria.sub_criteria.alternatives:id,name,sub_criterion_id',
            ])
            ->get();

        return view('survey_form.show', compact('types'));
    }
}
