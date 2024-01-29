<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\BrandThemeConfiguration;

use Carbon\Carbon;



class BrandThemeConfigurationSeeder extends Seeder
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
            $company = new BrandThemeConfiguration;
            \DB::table('brand_theme_configurations')->insert([
                'brand_id' => $counter,
                'domain' => 'example'.$counter.'.com',
                'display_name'=> '1',
                'display_logo'=>'1',
                'theme' => 'light',
                'accent_color'=>'#ff0000',
                'button_color'=> 'light',
                'defaul_language'=>$counter,
                'image_avatar_type'=>'foxy',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
               
            ]);
        }

    }
}
