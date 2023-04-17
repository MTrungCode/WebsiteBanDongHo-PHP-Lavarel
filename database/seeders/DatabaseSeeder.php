<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \DB::table('admins')->insert([
            'name'      => 'TrungAdmin',
            'email'     => 'trung.admin.12@gmail.com',
            'phone'     => '0987125436',
            'password'  => Hash::make('1234567890')
        ]);
    }
}
