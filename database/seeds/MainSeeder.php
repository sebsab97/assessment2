<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;
use App\Models\User;
use App\Models\Address;
use App\Models\Item;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach(range(1, 35) as $index) {
            $user = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'gender' => $faker->randomElement(['male', 'female']),
                'password' => Hash::make($faker->password(10)),
            ]);

            Address::create([
                'user_id' => $user->id,
                'addr_1' => $faker->streetAddress,
                'addr_2' => $faker->streetName,
                'postcode' => $faker->postcode,
                'city' => $faker->city,
                'state' => $faker->state,
            ]);
            
            Item::create([
                'product_name' => $faker->word,
                'price' => $faker->randomNumber(3),
            ]);
        }
    }
}
