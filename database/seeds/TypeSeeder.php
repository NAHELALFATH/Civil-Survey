<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Enums\RespondentType;

class TypeSeeder extends Seeder
{
    const TYPES = [
        "Kepentingan",
        "Keberlanjutan"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            foreach (RespondentType::toArray() as $respondent_type) {
                foreach (self::TYPES as $type) {
                    Type::create([
                        'respondent_type' => $respondent_type,
                        'name' => $type,
                    ]);
                }
            }
        });
    }
}
