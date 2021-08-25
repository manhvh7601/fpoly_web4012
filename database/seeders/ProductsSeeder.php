<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for($i = 0 ; $i < 20 ; $i++){
            $data = [
                'name'=>$faker->name,
                'price'=>$faker->randomNumber(5),
                'quantity'=>$faker->randomNumber(2),
                'category_id'=>Category::all()->random()->id,
                'image'=>$faker->image
            ];
            DB::table('products')->insert($data);
        }
    }
}
