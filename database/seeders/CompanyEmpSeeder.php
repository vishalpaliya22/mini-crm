<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str;

class CompanyEmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            $companies = \DB::table('companies')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'website' => 'http://'.Str::random(5).'/sdsewe/eewew/sds'.Str::random(3),
            ]);
            /*if($companies){
                \DB::table('employees')->insert([
                    'first_name' => Str::random(5),
                    'last_name' => Str::random(5),
                    'email' => Str::random(10).'@gmail.com',
                    'phone_no' => rand(2,12),
                    'company_id' => $companies['id'],
                ]);
            }*/
        }
    }
}
