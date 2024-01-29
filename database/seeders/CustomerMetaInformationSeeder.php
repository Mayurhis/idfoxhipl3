<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\CustomerMetaInformation;

use Carbon\Carbon;



class CustomerMetaInformationSeeder extends Seeder
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
            $Customer_meta_info = new CustomerMetaInformation;
            \DB::table('customer_meta_information')->insert([
                'id' => $counter,
                'email'     => $faker->email,
                'meta_data' => $faker->text(100),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                
               
            ]);
        }

    }
}
