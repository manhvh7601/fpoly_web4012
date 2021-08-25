<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\User;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for($i = 0; $i <10 ; $i++){
            $data = [
                'user_id'=>User::all()->random()->id,
                'number'=>$faker->randomNumber(1,20),
                'address'=>$faker->address,
                'total_price'=>$faker->randomNumber(1,10),
                'status'=>$faker->randomNumber(1,6),
            ];
            DB::table('invoices')->insert($data);
        }
    }
}
