<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PatientLocationCode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr =[
            '01'=>'Home',
            '02'=>'Intermediary Care',
            '03'=>'Nursing Home',
            '04'=>'Long-Term/Extended Care',
            '05'=>'Rest Home',
            '06'=>'Boarding Home',
            '07'=>'Skilled-Care Facility',
            '08'=>'Sub-Acute Care Facility',
            '09'=>'Acute Care Facility',
            '10'=>'Outpatient',
            '11'=>'Hospice',
            '98'=>'Unknown',
            '99'=>'Other'
        ];
        foreach($arr as $key => $value):
            DB::table('patient_location_code')->insert([
                "name"=>$value,
                "code"=>$key,
                'created_at' => Carbon::now()
            ]); 
        endforeach;  
    }
}
