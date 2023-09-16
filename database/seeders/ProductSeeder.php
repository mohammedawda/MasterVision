<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'        => Str::random(10),
            'description' => Str::random(10),
            'price'   => random_int(1, 1000),
            'shop_id'   => random_int(1, 1000),
            'cat_id'   => random_int(1, 1000),
            'created_at'  => Carbon::now(),
        ]);
    }
}
