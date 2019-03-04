<?php

use Illuminate\Database\Seeder;
use App\Response;
use App\PublicTransportUserResponse;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            factory(Response::class, 100)
                ->make()
                ->each(function (Response $response) {

                    $extra_data = factory(PublicTransportUserResponse::class)
                        ->states(array_random(PublicTransportUserResponse::STATES))
                        ->create();

                    $response
                        ->extra_data()
                        ->associate($extra_data);

                    $response->save();
                });
        });
    }
}
