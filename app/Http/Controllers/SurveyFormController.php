<?php

namespace App\Http\Controllers;

use App\Type;
use App\Enums\RespondentType;

class SurveyFormController extends Controller
{
    public function show()
    {
        $respondent_types = RespondentType::toArray();
        $respondent_type = request("respondent_type");

        if (empty($respondent_type) || !in_array(request("respondent_type"), $respondent_types)) {
            $respondent_type = collect($respondent_types)->first();
        }

        $types = Type::query()
            ->select('id', 'name')
            ->with([
                'criteria:id,name,type_id',
                'criteria.sub_criteria:id,name,criterion_id',
                'criteria.sub_criteria.alternatives:id,name,sub_criterion_id',
            ])
            ->where('types.respondent_type', $respondent_type)
            ->get();

        return view('survey_form.show', compact('types', 'respondent_type'));
    }
}
