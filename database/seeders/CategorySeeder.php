<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parent = [null, random_int(1, 1000)];
        DB::table('categories')->insert([
            'name'        => Str::random(10),
            'description' => Str::random(10),
            'parent_id'   => $parent[array_rand($parent)],
            'created_at'  => Carbon::now(),
        ]);
    }
}
