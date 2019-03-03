<?php

use Illuminate\Database\Seeder;
use App\Criterion;
use App\SubCriterion;

class SubCriteriaSeeder extends Seeder
{
    const BASE_SUB_CRITERIA = [
        "Keamanan dan Kenyamanan",
        "Cakupan Wilayah Pelayanan",
        "Landmark dan Bentuk Perkotaan",
        "Kemudahan Akses Bagi Masy. Ekonomi Rendah dan Penyandang Cacat",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function() {
            $criteria = Criterion::query()
                ->select('id')
                ->get();

            foreach ($criteria as $criterion) {
                foreach (self::BASE_SUB_CRITERIA as $sub_criterion) {
                    SubCriterion::create([
                        'criterion_id' => $criterion->id,
                        'name' => $sub_criterion,
                    ]);
                }
            }
        });
    }
}
