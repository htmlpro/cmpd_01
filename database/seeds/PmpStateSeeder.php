<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PmpStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->update(['status'=>1,'pmp_status'=>0]);
        $arr =[
            'TX'=>'Texas',
            'GA'=>'Georgia',
            'FL'=>'Florida',
            'PA'=>'Pennsylvania',
            'OH'=>'Ohio',
            'AZ'=>'Arizona',
            'NJ'=>'New Jersey',
            'WA'=>'Washington',
            'CO'=>'Colorado',
            'MO'=>'Missouri',
            'IN'=>'Indiana',
            'CT'=>'Connecticut',
            'MA'=>'Massachusetts',
            'MN'=>'Minnesota',
            'RI'=>'Rhode Island',
            'AK'=>'Alaska',
            'NM'=>'New Mexico',
            'VT'=>'Vermont',
            'DC'=>'Washington, D.C.',
            'HI'=>'Hawaii',
            'MS'=>'Mississippi'
        ];
        foreach($arr as $key => $value):
            if($this->checkState($key)>0):
                DB::table('states')->where('postal_code',$key)->update(['pmp_status'=>1]);   
            else:
                DB::table('states')->insert([
                    "postal_code"=>$key,
                    "name"=>$value,
                    "pmp_status"=>1,
                    "status"=>0,
                    'created_at' => Carbon::now()
                ]); 
            endif;
        endforeach;
  
   
    }
    public function checkState($code){
        $check = DB::table('states')->where('postal_code',$code)->count();
        return $check;
    }
}
