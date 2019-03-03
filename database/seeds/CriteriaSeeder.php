<?php

use Illuminate\Database\Seeder;
use App\Criterion;
use App\Type;

class CriteriaSeeder extends Seeder
{
    const BASE_CRITERIA = [
        'Ekonomi', 'Sosial',
        'Lingkungan', 'Teknis dan Operasional'
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            $types = Type::query()
                ->select('id')
                ->get();

            foreach ($types as $type) {
                foreach (self::BASE_CRITERIA as $criterion) {
                    Criterion::create([
                        'type_id' => $type->id,
                        'name' => $criterion
                    ]);
                }
            }
        });
    }
}
