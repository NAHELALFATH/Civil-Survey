<?php

use Illuminate\Database\Seeder;
use App\SubCriterion;
use App\Alternative;

class AlternativeSeeder extends Seeder
{
    const ALTERNATIVES = [
        "Alternatif – 1 (MRT + KA Komuter)",
        "Alternatif – 2 (MRT + BRT Jabodetabek)",
        "Alternatif – 3 (LRT/Monorel + KA Komuter)",
        "Alternatif – 4 (LRT/Monorel + BRT Jabodetabek)",
        "Alternatif – 5 (KA Komuter + BRT Jabodetabek)",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            $sub_criteria = SubCriterion::query()
                ->select('id', 'criterion_id')
                ->get();
            
            foreach ($sub_criteria as $sub_criterion) {
                
                if ($sub_criterion->criterion->type->name == "Kepentingan") {
                    Alternative::create([
                        'sub_criterion_id' => $sub_criterion->id,
                        'name' => '-',
                    ]);
                }
                else {
                    foreach (self::ALTERNATIVES as $alternative) {
                        Alternative::create([
                            'sub_criterion_id' => $sub_criterion->id,
                            'name' => $alternative,
                        ]);
                    }
                }
            }
        });
    }
}
