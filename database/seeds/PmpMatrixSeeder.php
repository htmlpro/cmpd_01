<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PmpMatrixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* *TX State* */
       DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PAT23',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP12',
        "field_type"=>'CS2*',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP18',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP19',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP20',
        "field_type"=>'CS2*',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PRE01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PRE04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PRE05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PRE06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR01',
        "field_type"=>'CS2*',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR02',
        "field_type"=>'CS2*',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'AIR12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'TX',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End TX State* */
    
     /* *GA State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'IS03',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA01',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA02',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA12',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT02',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT03',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT17',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT20',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT21',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP11',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP12',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP14',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP15',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP17',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP18',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP19',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP20',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PRE01',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PRE04',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PRE06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'AIR12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'GA',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End GA State* */
    
     /* *FL State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TH03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TH04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TH08',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'IS03',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA03',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA07',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA08',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA10',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA11',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA12',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PHA13',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT07',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT08',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT10',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT12',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT14',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT15',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT16',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT17',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT18',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT19',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT20',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT21',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT22',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP02',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP03',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP05',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP06',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP08',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP09',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP12',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP14',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP15',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP16',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP17',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP18',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP19',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP20',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP22',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP24',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'DSP25',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PRE01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PRE02',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PRE04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PRE05',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PRE06',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PRE07',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PRE08',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'PRE09',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'CDI01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'CDI02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'CDI03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'CDI04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR04',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR07',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR08',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR10',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR11',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'AIR12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'FL',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End FL State* */
    
     /* *PA State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA12',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT17',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT20',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP13',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP14',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP15',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP17',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PRE01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PRE04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PRE06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PRE07',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'PA',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End PA State* */
    
     /* *OH State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TH03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PHA13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT17',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT20',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT22',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PAT23',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP13',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP23',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP24',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'DSP25',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PRE01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PRE03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PRE04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PRE06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'PRE09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'CDI01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'CDI02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'CDI03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'CDI04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'CDI05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'OH',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End OH State* */
    
     /* *AZ State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TH03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PHA13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT17',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT20',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT22',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PAT23',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP13',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP23',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP24',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'DSP25',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PRE01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PRE03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PRE04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PRE06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'PRE09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'CDI01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'CDI02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'CDI03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'CDI04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'CDI05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AZ',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End AZ State* */
    
    
       /* *NJ State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'IS03',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA02',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA12',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT02',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT03',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT17',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT20',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT21',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP12',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP14',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP15',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP17',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP18',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP19',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP20',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PRE01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PRE04',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PRE06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PRE08',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR01',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR02',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR07',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR08',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR09',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NJ',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End NJ State* */
    
    /* *WA State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA03',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PHA13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT02',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT03',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT07',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT08',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT12',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT14',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT15',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT16',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT18',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT19',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT20',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP03',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP04',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP05',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP06',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP07',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP08',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP09',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP10',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP14',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP16',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP22',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP24',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'DSP25',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PRE01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PRE02',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PRE03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PRE04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PRE05',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PRE06',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PRE08',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'PRE09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'CDI01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'CDI02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'CDI03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'CDI04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'CDI05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR07',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR08',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR11',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'WA',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End WA State* */
    
    /* *CO State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TH03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TH04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TH08',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'IS03',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA03',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA05',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA07',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA08',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA09',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA10',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA11',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA12',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT07',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT08',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT10',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT12',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT14',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT15',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT16',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT17',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT18',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT19',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT20',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT21',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT22',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP02',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP03',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP04',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP05',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP06',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP07',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP08',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP09',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP10',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP11',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP12',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP14',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP15',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP16',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP17',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP18',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP19',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP20',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PRE01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PRE02',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PRE04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PRE05',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PRE06',
        "field_type"=>'RR',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PRE07',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PRE08',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'CDI01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'CDI02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'CDI03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'CDI04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR07',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR08',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR10',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR11',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CO',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End CO State* */
    
     /* *MO State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TH03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TH04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TH08',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'IS03',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA01',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA02',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA10',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA11',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA12',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT01',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT02',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT03',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT04',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT05',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT06',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT10',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT17',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT19',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT20',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT21',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT22',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PAT23',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP12',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP13',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP14',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP15',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP17',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP18',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP19',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP20',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PRE01',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PRE04',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PRE06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PRE07',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PRE08',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'CDI01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'CDI02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'CDI03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'CDI04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'CDI05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR01',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR02',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR03',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR04',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR05',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR06',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR07',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR08',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR09',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR10',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR11',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MO',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End MO State* */
    
    /* *IN State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TH03',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TH04',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TH08',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'IS03',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA01',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA03',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA04',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA05',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA06',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA07',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA08',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA10',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA11',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT01',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT04',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT05',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT06',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT09',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT10',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT11',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT13',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT17',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT20',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT21',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PAT23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP14',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP15',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP17',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP18',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP19',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP20',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP21',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PRE01',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PRE04',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PRE05',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PRE06',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PRE07',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PRE08',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'CDI01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'CDI02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'CDI03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'CDI04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'CDI05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR01',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR02',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR03',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR04',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR05',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR06',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR07',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR08',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR10',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR11',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'IN',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End IN State* */
    
    
    /* *CT State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT20',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT21',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT22',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PRE01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PRE04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PRE06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR11',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'CT',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End CT State* */
   
    /* *MA State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TH03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TH04',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TH08',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'IS03',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA01',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA05',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA06',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA07',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA09',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA11',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA12',
        "field_type"=>'C',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT01',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT02',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT03',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT04',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT05',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT06',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT09',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT10',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT11',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT13',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT17',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT20',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT21',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT22',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PAT23',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP13',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP14',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP15',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP17',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP18',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP19',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP20',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP21',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PRE01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PRE02',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PRE03',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PRE04',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PRE05',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PRE06',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PRE07',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PRE08',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'CDI01',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'CDI02',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'CDI03',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'CDI04',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'CDI05',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR01',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR02',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR03',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR04',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR05',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR07',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR08',
        "field_type"=>'C',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR09',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR10',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MA',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End MA State* */
   
        /* *MN State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT17',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT20',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT21',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP12',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP13',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP17',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PRE01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PRE03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PRE04',
        "field_type"=>'N',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PRE06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PRE07',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PRE08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'CDI01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'CDI02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'CDI03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'CDI04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'CDI05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MN',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End MN State* */
    
      /* *RI State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PHA13',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT20',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP22',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP23',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP24',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'DSP25',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PRE01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PRE03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PRE04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PRE05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PRE06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'PRE09',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'RI',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End RI State* */
   
     /* *AK State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT20',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PRE01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PRE03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PRE04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PRE06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'AK',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End AK State* */
   
    /* *NM State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'IS03',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA12',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT02',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT03',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT17',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT20',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT21',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP14',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP15',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP17',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP18',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP19',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP20',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PRE01',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PRE04',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PRE06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'NM',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End NM State* */
   
    /* *VT State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA11',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA12',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT02',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT03',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT17',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT20',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PAT23',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP13',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP15',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP17',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP23',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP24',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'DSP25',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PRE01',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PRE04',
        "field_type"=>'O',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PRE05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PRE06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'VT',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End VT State* */
   
     /* *DC State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA12',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT17',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT20',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT21',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT22',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PAT23',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP17',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PRE01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PRE04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PRE05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PRE06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PRE07',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'DC',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End DC State* */
   
     /* *HI State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TH04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT11',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT17',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT20',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT22',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP11',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP13',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP18',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP19',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP20',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP21',
        "field_type"=>'S',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PRE01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PRE04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PRE05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PRE06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PRE08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'CDI01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'CDI02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'CDI03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'CDI04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR06',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR07',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR08',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR09',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR10',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR11',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'HI',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End HI State* */
    
        /* *MS State* */
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TH01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TH02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TH03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TH04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TH05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TH06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TH07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TH08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TH09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'IS01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'IS02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'IS03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PHA13',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT12',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT14',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT15',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT17',
        "field_type"=>'P',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT18',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);

    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT19',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT20',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT22',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PAT23',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP03',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP04',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP05',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP06',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP07',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP08',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP09',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP10',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP11',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP12',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP13',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP14',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP15',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP16',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP17',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP18',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP19',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP20',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP21',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP22',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP23',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP24',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'DSP25',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PRE01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PRE02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PRE03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PRE04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PRE05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PRE06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PRE07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PRE08',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'PRE09',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'CDI01',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'CDI02',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);  DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'CDI03',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'CDI04',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'CDI05',
        "field_type"=>'S',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR01',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR02',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR03',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR04',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR05',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR06',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR07',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);  
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR08',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR09',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR10',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR11',
        "field_type"=>'N',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'AIR12',
        "field_type"=>'',
        "rule"=>0,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TP01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TT01',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
    DB::table('pmp_matrix_master')->insert([
        "version"=>'4.2',
        "pmp_state_code"=>'MS',
        "field_code"=>'TT02',
        "field_type"=>'R',
        "rule"=>1,
        'created_at' => Carbon::now()
    ]);
   
    /**End MS State* */
   
       
    }
}
