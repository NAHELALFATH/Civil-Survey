<?php

use Illuminate\Database\Seeder;
use App\Response;
use App\PublicTransportUserResponse;
use App\Enums\RespondentType;
use App\SurveyData;
use App\Type;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = Type::query()
            ->select('id', 'name', "respondent_type")
            ->with([
                'criteria:id,name,type_id',
                'criteria.sub_criteria:id,name,criterion_id',
                'criteria.sub_criteria.alternatives:id,name,sub_criterion_id',
            ])
            ->orderBy("id")
            ->get()
            ->groupBy("respondent_type");

        DB::transaction(function() use($types) {
            factory(Response::class, 50)
                ->make()
                ->each(function (Response $response) use($types) {

                    $extra_data = factory(PublicTransportUserResponse::class)
                        ->states(array_random(PublicTransportUserResponse::STATES))
                        ->create();

                    $response
                        ->extra_data()
                        ->associate($extra_data);

                    $response->save();

                    foreach ($types[(string) RespondentType::public_transport_user()] as $type) {
                        foreach ($type->criteria as $criterion) {
                            foreach ($criterion->sub_criteria as $sub_criterion) {
                                foreach ($sub_criterion->alternatives as $alternative) {
                                    SurveyData::create([
                                        'response_id' => $response->id,
                                        'type_id' => $type->id,
                                        'criterion_id' => $criterion->id,
                                        'sub_criterion_id' => $sub_criterion->id,
                                        'alternative_id' => $alternative->id,
                                        'rating' => rand(1, 5)
                                    ]);
                                }
                            }
                        }
                    }
                });
        });
    }
}
