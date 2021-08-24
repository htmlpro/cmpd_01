<?php

use Illuminate\Database\Seeder;

class AddNewIdentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            "name"=>"Social Security Number",
            "pmp_code"=>"07",
        ]); 
        DB::table('documents')->insert([
            "name"=>"Other (agreed upon ID)",
            "pmp_code"=>"99",
        ]); 
    }
}
