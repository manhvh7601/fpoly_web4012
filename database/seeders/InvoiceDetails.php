<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceDetails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'invoice_id' => Invoice::all()->random()->id,
                'product_id' => Product::all()->random()->id,
                'unit_price' => $faker->randomNumber(6),
                'quantity' => $faker->randomNumber(1, 9),
            ];
            DB::table('invoice_details')->insert($data);
        }
    }
}
