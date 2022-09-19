<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\products;

use App\Quotation;
class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Quotation::truncate();
        products::truncate();

        foreach(range(1, 20) as $i) {
            $products = collect();
            foreach(range(1, mt_rand(2, 10)) as $j) {
                $unitPrice = $faker->numberBetween(100, 1000);
                $qty = $faker->numberBetween(1, 20);
                $products->push(new products([

                    'Product_name' => $faker->sentence,
                    'qategory' => $faker->sentence,
                    'price' => $unitPrice,
                    'qty' => $qty,
                    'total' => ($qty  * $unitPrice)
                ]));

            }

            $subTotal = $products->sum('total');
            $discount = $faker->numberBetween(10, 20);
            $total = $subTotal - $discount;

            $Quote = Quotation::create([
                'client' => $faker->name,
                'client_address' => $faker->address,
                'title' => $faker->sentence,
                'quote_number' => $faker->numberBetween(1000, 2000),
                'quote_Date' => $faker->date(),
                'discount' => $discount,
                'sub_total' => $subTotal,
                'grand_total' => $total
            ]);

            $Quote->products()->saveMany($products);
        }
    }
    
}
