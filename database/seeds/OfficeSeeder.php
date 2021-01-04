<?php

use App\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Office::create([
            'name' => 'President'
        ]);
        Office::create([
            'name' => 'Secretary'
        ]);
        Office::create([
            'name' => 'Governor'
        ]);
    }
}
