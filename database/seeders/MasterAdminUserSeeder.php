<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MasterAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('master_admin')->insert([
            /*'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),*/
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('password'),
        ]);
    }
}
