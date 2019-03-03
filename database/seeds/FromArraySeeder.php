<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Type;
use App\Criterion;
use App\SubCriterion;
use App\Alternative;

class FromArraySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // DB::transaction(function () {
            $master_data = require(__DIR__ . "/master_data.php");

            foreach ($master_data as $respondent_type => $types) {
                foreach ($types as $type => $criteria) {

                    $new_type = Type::create([
                        "respondent_type" => $respondent_type,
                        "name" => $type,
                    ]);

                    foreach ($criteria as $criterion => $sub_criteria) {

                        $new_criterion = Criterion::create([
                            "type_id" => $new_type->id,
                            "name" => $criterion,
                        ]);

                        foreach ($sub_criteria as $key => $value) {

                            if (is_array($value)) {
                                $sub_criterion = $key;
                                $alternatives = $value;

                                $new_sub_criterion = SubCriterion::create([
                                    "criterion_id" => $new_criterion->id,
                                    "name" => $sub_criterion,
                                ]);

                                foreach ($alternatives as $alternative) {
                                    Alternative::create([
                                        "sub_criterion_id" => $new_sub_criterion->id,
                                        "name" => $alternative,
                                    ]);
                                }
                            }
                            else {
                                $sub_criterion = $value;

                                $new_sub_criterion = SubCriterion::create([
                                    "criterion_id" => $new_criterion->id,
                                    "name" => $sub_criterion,
                                ]);

                                Alternative::create([
                                    "sub_criterion_id" => $new_sub_criterion->id,
                                    "name" => "-",
                                ]);
                            }
                        }
                    }
                }
            }
        // });
    }
}
