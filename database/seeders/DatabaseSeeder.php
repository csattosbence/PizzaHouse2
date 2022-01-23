<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Database\Factories\ProductFactory;
use Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'), // password
                'address' => 'Budapest',
                'phone_number' => '00000000',
                'role' => 'Admin',
                'remember_token' => Str::random(10),
            ]
        ]);
        User::factory(10)->create();
        DB::table('categories')->insert([
            ['name' => 'Pizza'],
            ['name' => 'Drink'],
            ['name' => 'Vegan']
        ]);
        $this->createProduct('Pizza',50);
        $this->createProduct('Drink',50);
    }
    public function createProduct($categoryName,$count)
    {
        $faker = Faker\Factory::create();
        $category = DB::table('categories')->where('name','=',$categoryName)->get();
        for ($x = 0; $x <= $count; $x+=1) {
            $productName = $faker->city()." ".$category[0]->name;
            Product::factory()->create(['category_id' => $category[0]->id,'name' => $productName]);
        }
    }
}
