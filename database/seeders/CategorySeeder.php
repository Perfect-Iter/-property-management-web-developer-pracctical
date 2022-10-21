<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        Category::insert([
            [
                'name' => 'apartment',
                'created_at'=>$now,
                'updated_at'=>$now,
            ],
            [
                'name' => 'residential',
                'created_at'=>$now,
                'updated_at'=>$now,
            ],
            [
                'name' => 'self contained',
                'created_at'=>$now,
                'updated_at'=>$now,
            ],
            [
                'name' => 'bedsitter',
                'created_at'=>$now,
                'updated_at'=>$now,
            ],
        ]);
    }
}
