<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // DB::table("users")->insert([
        //     "full_name"=> "admin",
        //     "birthday"=> "2004-01-01",
        //     "sex"=> "male",
        //     "phone"=> "0123456789",
        //     "avatar"=> null,
        //     "email"=> "admin@gmail.com",
        //     "password"=> bcrypt("ducnobi2004"),
        //     "address"=> null,
        //     "delivery_address_id"=> null,
        //     "delivery_phone_id"=> null,
        //     "role" => "admin"
        // ]);
        $this->call([
            ProductsTableSeeder::class
        ]);
        
    }
}
