<?php

namespace App\Http\Controllers;

use App\Type;
use App\Enums\RespondentType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResponseController extends Controller
{
    public function getRespondentType()
    {
        $respondent_types = RespondentType::toArray();
        $respondent_type = request("respondent_type");

        if (empty($respondent_type) || !in_array(request("respondent_type"), $respondent_types)) {
            $respondent_type = collect($respondent_types)->first();
        };

        return $respondent_type;
    }

    public function create()
    {
        $respondent_type = $this->getRespondentType();

        $types = Type::query()
            ->select('id', 'name')
            ->with([
                'criteria:id,name,type_id',
                'criteria.sub_criteria:id,name,criterion_id',
                'criteria.sub_criteria.alternatives:id,name,sub_criterion_id',
            ])
            ->orderBy("id")
            ->where('types.respondent_type', $respondent_type)
            ->get();

        switch ($respondent_type) {
            case RespondentType::public_transport_user(): {
                return view('response.public_transport_user.create', compact('types', 'respondent_type'));
                break;
            }
            case RespondentType::public_transport_operator_investor(): {
                break;
            }
            case RespondentType::public_transport_regulator(): {
                break;
            }
        }
    }

    public function store()
    {
        $respondent_type = $this->getRespondentType();

        // $specific_rules = [];

        $validator = Validator::make(request()->all(), []);

        switch($respondent_type) {
            case RespondentType::public_transport_user(): {
                
                $validator->addRules([
                    "respondent_occupation" => "required",
                    "respondent_monthly_revenue" => "required",
                    "is_public_transport_user" => "required",
                ]);

                $validator->sometimes([
                    "public_transport_usage_duration",
                    "public_transport_usage_purpose",
                    "desired_public_transport_type"
                ], ["required"], function ($input) {
                    return $input->is_public_transport_user == 1;
                });

                $validator->sometimes([
                    "public_transport_disuse_reason",
                ], ["required"], function ($input) {
                    return $input->is_public_transport_user == 0;
                });

                break;
            }
            case RespondentType::public_transport_operator_investor(): {
                break;
            }
            case RespondentType::public_transport_regulator(): {
                break;
            }
        } 

        $validator->addRules([
            "respondent_name" => "required",
            "respondent_sex" => "required",
            "respondent_age" => "required",
            "respondent_address" => "required",
            "survey_data" => "required",
            "survey_data.*.rating" => "required|string",
            "survey_data.*.type_id" => "required",
            "survey_data.*.criterion_id" => "required",
            "survey_data.*.sub_criterion_id" => "required",
            "survey_data.*.alternative_id" => "required"
        ]);

        $validator->validate();

        // $validator = Validator::make(request(), array_merge($general_rules, $specific_rules));
        // $validator->rules


    }
}
