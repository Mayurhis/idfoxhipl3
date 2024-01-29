<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Address;

use Carbon\Carbon;



class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create();
        $i = 1;
        
        
    
        foreach (range(1, 20) as $index) {
            $counter = $i++;
            $address = new Address;
            \DB::table('addresses')->insert([
                'customer_id' => $counter,
                'address'     => $faker->streetAddress.' '.$faker->secondaryAddress,
                'city' =>  $faker->city,
                'zipcode'     =>$faker->postcode,
                'country_id' => $counter,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                
               
            ]);
        }

    }
}
