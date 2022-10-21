<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon::now()->toDateTimeString();
        Property::insert([
            [
                'categoryid' => 1,
                'property_name' => 'house1',
                'owner' => 1,
                'no_of_rooms' => 2,
                'no_of_bathrooms' => 1,
                'location' => 'nairobi',
                'status' => 'available',
                'created_at'=>$now,
                'updated_at'=>$now,
            ],
            [
                'categoryid' => 3,
                'property_name' => 'house2',
                'owner' => 1,
                'no_of_rooms' => 1,
                'no_of_bathrooms' => 1,
                'location' => 'nairobi',
                'status' => 'available',
                'created_at'=>$now,
                'updated_at'=>$now,
            ],
            [
                'categoryid' => 1,
                'property_name' => 'house3',
                'owner' => 1,
                'no_of_rooms' => 2,
                'no_of_bathrooms' => 1,
                'location' => 'mombasa',
                'status' => 'available',
                'created_at'=>$now,
                'updated_at'=>$now,
            ],
            [
                'categoryid' => 2,
                'property_name' => 'house5',
                'owner' => 1,
                'no_of_rooms' => 3,
                'no_of_bathrooms' => 2,
                'location' => 'nakuru',
                'status' => 'occupied',
                'created_at'=>$now,
                'updated_at'=>$now,
            ],
        ]);
    }
}
