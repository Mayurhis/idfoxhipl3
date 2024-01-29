<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Customer;

use Carbon\Carbon;



class CustomerSeeder extends Seeder
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
            $Customer = new Customer;
            \DB::table('customers')->insert([
                'uuid' => $counter,
                'brand_id' => $counter,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'dob' => Carbon::now()->format('Y-m-d'),
                'mobile_number' => '1234567890',
                'email'     => $faker->email,
                'term_condition' => '1',
                'verification_status' => '1',
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
               
            ]);
        }

    }
}
