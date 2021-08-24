<?php

use Illuminate\Database\Seeder;

class LabelMatrixSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // For Real Client and Formula is TGW
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL INITIAL FORM) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TRI",
            'formula_id' => '733',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:1000,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL INITIAL FORM) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TRI",
            'formula_id' => '733',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:100,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL INITIAL FORM) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TRI",
            'formula_id' => '733',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL INITIAL FORM) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TRI",
            'formula_id' => '733',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "BLUE",
            'class' => "VIAL #4 1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL INITIAL FORM) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TRI",
            'formula_id' => '733',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:100 V/V",
        ]);

        // For Real Client and Formula is MERI
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL INITIAL FORM) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MRI",
            'formula_id' => '734',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:1000,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL INITIAL FORM) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MRI",
            'formula_id' => '734',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:100,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL INITIAL FORM) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MRI",
            'formula_id' => '734',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL INITIAL FORM) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MRI",
            'formula_id' => '734',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "BLUE",
            'class' => "VIAL #4 1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL INITIAL FORM) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MRI",
            'formula_id' => '734',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:100 V/V",
        ]);

        // For Real Client and Formula is TGWR
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL ALLERGY 1:100-1:1'000,000) (5 VIALS) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "TR",
            'formula_id' => '335',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:1000,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL ALLERGY 1:100-1:1'000,000) (5 VIALS) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "TR",
            'formula_id' => '335',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:100,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL ALLERGY 1:100-1:1'000,000) (5 VIALS) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "TR",
            'formula_id' => '335',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL ALLERGY 1:100-1:1'000,000) (5 VIALS) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "TR",
            'formula_id' => '335',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "BLUE",
            'class' => "VIAL #4 1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "TGW (REAL ALLERGY 1:100-1:1'000,000) (5 VIALS) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "TR",
            'formula_id' => '335',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:100 V/V",
        ]);

        // For Real Client and Formula is ME
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL ALLERGY) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "MR",
            'formula_id' => '336',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:1000,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL ALLERGY) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "MR",
            'formula_id' => '336',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:100,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL ALLERGY) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "MR",
            'formula_id' => '336',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL ALLERGY) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "MR",
            'formula_id' => '336',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "BLUE",
            'class' => "VIAL #4 1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'REAL',
            'formula_name' => "ME (REAL ALLERGY) 1:100 - 1:1'000,000 INJECTABLE",
            'speedcode' => "MR",
            'formula_id' => '336',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:100 V/V",
        ]);

        // For NationWide Client and Formula is SLIT
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "SLIT NATIONWIDE (1:10-1:10,000) (4 VIALS) 1:10 -1:10,000 SOLUTION",
            'speedcode' => "SLN",
            'formula_id' => '713',
            'formula_short' => 'SLIT',
            'num_of_vial' => 4,
            'vial' => 1,
            'color' => "GREEN",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "SLIT NATIONWIDE (1:10-1:10,000) (4 VIALS) 1:10 -1:10,000 SOLUTION",
            'speedcode' => "SLN",
            'formula_id' => '713',
            'formula_short' => 'SLIT',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "BLUE",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "SLIT NATIONWIDE (1:10-1:10,000) (4 VIALS) 1:10 -1:10,000 SOLUTION",
            'speedcode' => "SLN",
            'formula_id' => '713',
            'formula_short' => 'SLIT',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "SLIT NATIONWIDE (1:10-1:10,000) (4 VIALS) 1:10 -1:10,000 SOLUTION",
            'speedcode' => "SLN",
            'formula_id' => '713',
            'formula_short' => 'SLIT',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "RED",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        
        // For NationWide Client and Formula is UMIX
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "UMIX NATIONWIDE 1:10-1:10000) (4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "UMI",
            'formula_id' => '712',
            'formula_short' => 'UMIX',
            'num_of_vial' => 4,
            'vial' => 1,
            'color' => "GREEN",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "UMIX NATIONWIDE 1:10-1:10000) (4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "UMI",
            'formula_id' => '712',
            'formula_short' => 'UMIX',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "BLUE",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "UMIX NATIONWIDE 1:10-1:10000) (4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "UMI",
            'formula_id' => '712',
            'formula_short' => 'UMIX',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "UMIX NATIONWIDE 1:10-1:10000) (4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "UMI",
            'formula_id' => '712',
            'formula_short' => 'UMIX',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "RED",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        
        // For NationWide Client and Formula is TN
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "TGW (NATIONWIDE ALLERGY 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TN",
            'formula_id' => '794',
            'formula_short' => 'TGW A/B MIX',
            'num_of_vial' => 4,
            'vial' => 1,
            'color' => "GREEN",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "TGW (NATIONWIDE ALLERGY 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TN",
            'formula_id' => '794',
            'formula_short' => 'TGW A/B MIX',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "BLUE",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "TGW (NATIONWIDE ALLERGY 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TN",
            'formula_id' => '794',
            'formula_short' => 'TGW A/B MIX',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "TGW (NATIONWIDE ALLERGY 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TN",
            'formula_id' => '794',
            'formula_short' => 'TGW A/B MIX',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "RED",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        
        // For NationWide Client and Formula is MN
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "ME (NATIONWIDE ALLERGY 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MN",
            'formula_id' => '795',
            'formula_short' => 'ME A/B MIX',
            'num_of_vial' => 4,
            'vial' => 1,
            'color' => "GREEN",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "ME (NATIONWIDE ALLERGY 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MN",
            'formula_id' => '795',
            'formula_short' => 'ME A/B MIX',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "BLUE",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "ME (NATIONWIDE ALLERGY 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MN",
            'formula_id' => '795',
            'formula_short' => 'ME A/B MIX',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "ME (NATIONWIDE ALLERGY 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MN",
            'formula_id' => '795',
            'formula_short' => 'ME A/B MIX',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "RED",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        
        // For NationWide Client and Formula is TNA
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "TGW (NATIONWIDE ALLERGENEX 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TNA",
            'formula_id' => '796',
            'formula_short' => 'TGW A/B MIX',
            'num_of_vial' => 4,
            'vial' => 1,
            'color' => "GREEN",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "TGW (NATIONWIDE ALLERGENEX 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TNA",
            'formula_id' => '796',
            'formula_short' => 'TGW A/B MIX',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "BLUE",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "TGW (NATIONWIDE ALLERGENEX 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TNA",
            'formula_id' => '796',
            'formula_short' => 'TGW A/B MIX',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "TGW (NATIONWIDE ALLERGENEX 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TNA",
            'formula_id' => '796',
            'formula_short' => 'TGW A/B MIX',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "RED",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        
        // For NationWide Client and Formula is MNA
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "ME (NATIONWIDE ALLERGENEX 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MNA",
            'formula_id' => '797',
            'formula_short' => 'ME A/B MIX',
            'num_of_vial' => 4,
            'vial' => 1,
            'color' => "GREEN",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "ME (NATIONWIDE ALLERGENEX 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MNA",
            'formula_id' => '797',
            'formula_short' => 'ME A/B MIX',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "BLUE",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "ME (NATIONWIDE ALLERGENEX 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MNA",
            'formula_id' => '797',
            'formula_short' => 'ME A/B MIX',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'NATIONWIDE',
            'formula_name' => "ME (NATIONWIDE ALLERGENEX 4 VIALS & 4 SPRAY BOTTLES) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MNA",
            'formula_id' => '797',
            'formula_short' => 'ME A/B MIX',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "RED",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        
        // For ALLERGY PRESCRIPTION Client and Formula is TGW
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX WTX ALLERGY 1:1 - 1:10,000) (5 VIALS) 1:1-1:10,000 INJECTABLE",
            'speedcode' => "TW",
            'formula_id' => '728',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX WTX ALLERGY 1:1 - 1:10,000) (5 VIALS) 1:1-1:10,000 INJECTABLE",
            'speedcode' => "TW",
            'formula_id' => '728',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX WTX ALLERGY 1:1 - 1:10,000) (5 VIALS) 1:1-1:10,000 INJECTABLE",
            'speedcode' => "TW",
            'formula_id' => '728',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX WTX ALLERGY 1:1 - 1:10,000) (5 VIALS) 1:1-1:10,000 INJECTABLE",
            'speedcode' => "TW",
            'formula_id' => '728',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX WTX ALLERGY 1:1 - 1:10,000) (5 VIALS) 1:1-1:10,000 INJECTABLE",
            'speedcode' => "TW",
            'formula_id' => '728',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:1 V/V",
        ]);
        // For ALLERGY PRESCRIPTION Client and Formula is ME
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX WTX 1:1 - 1:10000 5 VIALS) 1:1 - 1:100000 INJECTABLE",
            'speedcode' => "MW",
            'formula_id' => '729',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX WTX 1:1 - 1:10000 5 VIALS) 1:1 - 1:100000 INJECTABLE",
            'speedcode' => "MW",
            'formula_id' => '729',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX WTX 1:1 - 1:10000 5 VIALS) 1:1 - 1:100000 INJECTABLE",
            'speedcode' => "MW",
            'formula_id' => '729',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX WTX 1:1 - 1:10000 5 VIALS) 1:1 - 1:100000 INJECTABLE",
            'speedcode' => "MW",
            'formula_id' => '729',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX WTX 1:1 - 1:10000 5 VIALS) 1:1 - 1:100000 INJECTABLE",
            'speedcode' => "MW",
            'formula_id' => '729',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:1 V/V",
        ]);
        // For ALLERGY PRESCRIPTION Client and Formula is TWG
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX PORTER) (1:1 - 1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TPO",
            'formula_id' => '746',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX PORTER) (1:1 - 1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TPO",
            'formula_id' => '746',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX PORTER) (1:1 - 1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TPO",
            'formula_id' => '746',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX PORTER) (1:1 - 1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TPO",
            'formula_id' => '746',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "TGW (RX PORTER) (1:1 - 1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TPO",
            'formula_id' => '746',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:1 V/V",
        ]);
        // For ALLERGY PRESCRIPTION Client and Formula is MEPO
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX PORTER) (1:1-1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "MPO",
            'formula_id' => '747',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX PORTER) (1:1-1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "MPO",
            'formula_id' => '747',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX PORTER) (1:1-1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "MPO",
            'formula_id' => '747',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX PORTER) (1:1-1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "MPO",
            'formula_id' => '747',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRESCRIPTION',
            'formula_name' => "ME (RX PORTER) (1:1-1:10000) (5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "MPO",
            'formula_id' => '747',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:1 V/V",
        ]);
        // For EXPERTUS Client and Formula is SLIT
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "SLIT (EXPERTUS 1:1 - 1:1000) (4 VIALS) 1:1-1:1000 SOLUTION",
            'speedcode' => "SE",
            'formula_id' => '735',
            'formula_short' => 'SLIT',
            'num_of_vial' => 4,
            'vial' => 1,
            'color' => "RED",
            'class' => "VIAL#1 1:1 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "SLIT (EXPERTUS 1:1 - 1:1000) (4 VIALS) 1:1-1:1000 SOLUTION",
            'speedcode' => "SE",
            'formula_id' => '735',
            'formula_short' => 'SLIT',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL#2 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "SLIT (EXPERTUS 1:1 - 1:1000) (4 VIALS) 1:1-1:1000 SOLUTION",
            'speedcode' => "SE",
            'formula_id' => '735',
            'formula_short' => 'SLIT',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL#3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "SLIT (EXPERTUS 1:1 - 1:1000) (4 VIALS) 1:1-1:1000 SOLUTION",
            'speedcode' => "SE",
            'formula_id' => '735',
            'formula_short' => 'SLIT',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL#4 1:1,000 V/V",
        ]);
        // For  EXPERTUS Client and Formula is ME
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "ME",
            'formula_id' => '732',
            'formula_short' => 'TGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "RED",
            'class' => "VIAL#1 1:1 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "ME",
            'formula_id' => '732',
            'formula_short' => 'TGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL#2 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "ME",
            'formula_id' => '732',
            'formula_short' => 'TGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL#3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "ME",
            'formula_id' => '732',
            'formula_short' => 'TGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL#4 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "ME",
            'formula_id' => '732',
            'formula_short' => 'TGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL#5 1:10,000 V/V",
        ]);
        // For  EXPERTUS Client and Formula is ME EXPMIX
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "TE",
            'formula_id' => '730',
            'formula_short' => 'ME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "RED",
            'class' => "VIAL#1 1:1 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "TE",
            'formula_id' => '730',
            'formula_short' => 'ME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL#2 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "TE",
            'formula_id' => '730',
            'formula_short' => 'ME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL#3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "TE",
            'formula_id' => '730',
            'formula_short' => 'ME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL#4 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "TE",
            'formula_id' => '730',
            'formula_short' => 'ME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL#5 1:10,000 V/V",
        ]);
        // For  EXPERTUS Client and Formula is MME EXPMIX
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MME( EXPERTUS EXPMIX)(2 RED VIALS) 1:1  INJECTABLE",
            'speedcode' => "",
            'formula_id' => '812',
            'formula_short' => 'MME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "RED",
            'class' => "VIAL#1 1:1 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MME( EXPERTUS EXPMIX)(2 RED VIALS) 1:1  INJECTABLE",
            'speedcode' => "",
            'formula_id' => '812',
            'formula_short' => 'MME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL#2 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MME( EXPERTUS EXPMIX)(2 RED VIALS) 1:1  INJECTABLE",
            'speedcode' => "",
            'formula_id' => '812',
            'formula_short' => 'MME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL#3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MME( EXPERTUS EXPMIX)(2 RED VIALS) 1:1  INJECTABLE",
            'speedcode' => "",
            'formula_id' => '812',
            'formula_short' => 'MME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL#4 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MME( EXPERTUS EXPMIX)(2 RED VIALS) 1:1  INJECTABLE",
            'speedcode' => "",
            'formula_id' => '812',
            'formula_short' => 'MME EXPMIX',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL#5 1:10,000 V/V",
        ]);
          // For  EXPERTUS Client and Formula is MTGW EXPMIX
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MTGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "",
            'formula_id' => '811',
            'formula_short' => 'MTGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "RED",
            'class' => "VIAL#1 1:1 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MTGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "",
            'formula_id' => '811',
            'formula_short' => 'MTGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL#2 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MTGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "",
            'formula_id' => '811',
            'formula_short' => 'MTGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL#3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MTGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "",
            'formula_id' => '811',
            'formula_short' => 'MTGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL#4 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'EXPERTUS',
            'formula_name' => "MTGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "",
            'formula_id' => '811',
            'formula_short' => 'MTGW EXPMIX',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL#5 1:10,000 V/V",
        ]);
        // For  PRIMARY Client and Formula is TP
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "TGW (PRIMARY ALLERGY  1:1 - 1:10,000) (5 VIALS) 1:1 - 1:10,000 SOLUTION",
            'speedcode' => "TP",
            'formula_id' => '738',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1  1:10000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "TGW (PRIMARY ALLERGY  1:1 - 1:10,000) (5 VIALS) 1:1 - 1:10,000 SOLUTION",
            'speedcode' => "TP",
            'formula_id' => '738',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "TGW (PRIMARY ALLERGY  1:1 - 1:10,000) (5 VIALS) 1:1 - 1:10,000 SOLUTION",
            'speedcode' => "TP",
            'formula_id' => '738',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "TGW (PRIMARY ALLERGY  1:1 - 1:10,000) (5 VIALS) 1:1 - 1:10,000 SOLUTION",
            'speedcode' => "TP",
            'formula_id' => '738',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "TGW (PRIMARY ALLERGY  1:1 - 1:10,000) (5 VIALS) 1:1 - 1:10,000 SOLUTION",
            'speedcode' => "TP",
            'formula_id' => '738',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5  1:1 V/V",
        ]);
        // For  PRIMARY Client and Formula is MP
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "ME (PRIMARY ALLERGY) (5 VIALS)  1:1 - 1:10000 SOLUTION",
            'speedcode' => "MP",
            'formula_id' => '739',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1  1:10000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "ME (PRIMARY ALLERGY) (5 VIALS)  1:1 - 1:10000 SOLUTION",
            'speedcode' => "MP",
            'formula_id' => '739',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "ME (PRIMARY ALLERGY) (5 VIALS)  1:1 - 1:10000 SOLUTION",
            'speedcode' => "MP",
            'formula_id' => '739',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "ME (PRIMARY ALLERGY) (5 VIALS)  1:1 - 1:10000 SOLUTION",
            'speedcode' => "MP",
            'formula_id' => '739',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "ME (PRIMARY ALLERGY) (5 VIALS)  1:1 - 1:10000 SOLUTION",
            'speedcode' => "MP",
            'formula_id' => '739',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5  1:1 V/V",
        ]);
        // For  PRIMARY Client and Formula is MTGW
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MTGW (PRIMARY ALLERGY  1:1 ) (2 RED VIALS) 1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '809',
            'formula_short' => 'MTGW',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1  1:10000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MTGW (PRIMARY ALLERGY  1:1 ) (2 RED VIALS) 1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '809',
            'formula_short' => 'MTGW',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MTGW (PRIMARY ALLERGY  1:1 ) (2 RED VIALS) 1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '809',
            'formula_short' => 'MTGW',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MTGW (PRIMARY ALLERGY  1:1 ) (2 RED VIALS) 1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '809',
            'formula_short' => 'MTGW',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MTGW (PRIMARY ALLERGY  1:1 ) (2 RED VIALS) 1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '809',
            'formula_short' => 'MTGW',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5  1:1 V/V",
        ]);
        // For  PRIMARY Client and Formula is MME
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MME (PRIMARY ALLERGY) (2 RED VIALS)  1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '810',
            'formula_short' => 'MME',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1  1:10000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MME (PRIMARY ALLERGY) (2 RED VIALS)  1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '810',
            'formula_short' => 'MME',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MME (PRIMARY ALLERGY) (2 RED VIALS)  1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '810',
            'formula_short' => 'MME',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MME (PRIMARY ALLERGY) (2 RED VIALS)  1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '810',
            'formula_short' => 'MME',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'PRIMARY',
            'formula_name' => "MME (PRIMARY ALLERGY) (2 RED VIALS)  1:1 SOLUTION",
            'speedcode' => "",
            'formula_id' => '810',
            'formula_short' => 'MME',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5  1:1 V/V",
        ]);
        // For  AP ALLERGY (Kirk) Client and Formula is TGW
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "TGW (AP ALLERGY KIRK) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TAP",
            'formula_id' => '741',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:1000,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "TGW (AP ALLERGY KIRK) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TAP",
            'formula_id' => '741',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:100,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "TGW (AP ALLERGY KIRK) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TAP",
            'formula_id' => '741',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "TGW (AP ALLERGY KIRK) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TAP",
            'formula_id' => '741',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4 1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "TGW (AP ALLERGY KIRK) (1:100 - 1:1000000) (5 VIALS) 1:100 - 1:1000000 INJECTABLE",
            'speedcode' => "TAP",
            'formula_id' => '741',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:100 V/V",
        ]);
        // For  AP ALLERGY (Kirk) Client and Formula is ME
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "ME (AP ALLERGY KIRK) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MAP",
            'formula_id' => '742',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1 1:1000,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "ME (AP ALLERGY KIRK) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MAP",
            'formula_id' => '742',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2 1:100,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "ME (AP ALLERGY KIRK) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MAP",
            'formula_id' => '742',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3 1:10,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "ME (AP ALLERGY KIRK) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MAP",
            'formula_id' => '742',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4 1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'AP ALLERGY',
            'formula_name' => "ME (AP ALLERGY KIRK) (1:100-1:1000000) (5 VIALS) 1:100-1:1000000 INJECTABLE",
            'speedcode' => "MAP",
            'formula_id' => '742',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5 1:100 V/V",
        ]);
        // For  ALLIANCE Client and Formula is MEA
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "ME (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "MA",
            'formula_id' => '736',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1  1:10000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "ME (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "MA",
            'formula_id' => '736',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "ME (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "MA",
            'formula_id' => '736',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "ME (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "MA",
            'formula_id' => '736',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "ME (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "MA",
            'formula_id' => '736',
            'formula_short' => 'ME',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5  1:1 V/V",
        ]);
        // For  ALLIANCE Client and Formula is TGWA
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "TGW (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "TA",
            'formula_id' => '737',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #1  1:10000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "TGW (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "TA",
            'formula_id' => '737',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GREEN",
            'class' => "VIAL #2  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "TGW (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "TA",
            'formula_id' => '737',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "TGW (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "TA",
            'formula_id' => '737',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #4  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'ALLIANCE',
            'formula_name' => "TGW (ALLIANCE 1:1-1:10,000) (5 VIALS) 1:1 - 1:10,000 INJECTABLE",
            'speedcode' => "TA",
            'formula_id' => '737',
            'formula_short' => 'TGW',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "RED",
            'class' => "VIAL #5  1:1 V/V",
        ]);
        // For USA Client and Formula is TGW
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY GA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUG",
            'formula_id' => '771',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #2  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY GA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUG",
            'formula_id' => '771',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY GA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUG",
            'formula_id' => '771',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL #4  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY GA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUG",
            'formula_id' => '771',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #5  1:10000 V/V",
        ]);  
          // For  USA Client and Formula is TGW
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY TX 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUF",
            'formula_id' => '784',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #2  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY TX 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUF",
            'formula_id' => '784',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY TX 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUF",
            'formula_id' => '784',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL #4  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY TX 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUF",
            'formula_id' => '784',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #5  1:10000 V/V",
        ]); 
          // For  USA Client and Formula is TUT
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY FL 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUT",
            'formula_id' => '781',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #2  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY FL 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUT",
            'formula_id' => '781',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY FL 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUT",
            'formula_id' => '781',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL #4  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY FL 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUT",
            'formula_id' => '781',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #5  1:10000 V/V",
        ]);        
        // For  USA Client and Formula is ME
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY GA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUG",
            'formula_id' => '772',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #2  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY GA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUG",
            'formula_id' => '772',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY GA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUG",
            'formula_id' => '772',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL #4  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY GA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUG",
            'formula_id' => '772',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #5  1:10000 V/V",
        ]); 
        // For  USA Client and Formula is ME - MUT
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY TX 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUT",
            'formula_id' => '782',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #2  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY TX 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUT",
            'formula_id' => '782',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY TX 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUT",
            'formula_id' => '782',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL #4  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY TX 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUT",
            'formula_id' => '782',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #5  1:10000 V/V",
        ]);
         // For  USA Client and Formula is ME - TUC
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY CA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUC",
            'formula_id' => '807',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #2  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY CA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUC",
            'formula_id' => '807',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY CA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUC",
            'formula_id' => '807',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL #4  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "TGW (USA ALLERGY CA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "TUC",
            'formula_id' => '807',
            'formula_short' => 'TGW',
            'num_of_vial' => 4,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #5  1:10000 V/V",
        ]);
        // For  USA Client and Formula is ME - MUC
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY CA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUC",
            'formula_id' => '808',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL #2  1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY CA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUC",
            'formula_id' => '808',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL #3  1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY CA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUC",
            'formula_id' => '808',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL #4  1:1000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'USA',
            'formula_name' => "ME  (USA ALLERGY CA 4 VIALS) 1:10 -1:10,000 INJECTABLE",
            'speedcode' => "MUC",
            'formula_id' => '808',
            'formula_short' => 'ME',
            'num_of_vial' => 4,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL #5  1:10000 V/V",
        ]);                
        // For LIFELINE Client and Formula is TGW LIFEMIX
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TL",
            'formula_id' => '788',
            'formula_short' => 'TGW LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "RED",
            'class' => "VIAL#1 1:1 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TL",
            'formula_id' => '788',
            'formula_short' => 'TGW LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL#2 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TL",
            'formula_id' => '788',
            'formula_short' => 'TGW LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL#3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TL",
            'formula_id' => '788',
            'formula_short' => 'TGW LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL#4 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "ME( EXPERTUS EXPMIX)(5 VIALS) 1:1 - 1:10000 INJECTABLE",
            'speedcode' => "TL",
            'formula_id' => '788',
            'formula_short' => 'TGW LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL#5 1:10,000 V/V",
        ]);
            // For LIFELINE Client and Formula is ME LIFEMIX
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "ML",
            'formula_id' => '790',
            'formula_short' => 'ME LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 1,
            'color' => "RED",
            'class' => "VIAL#1 1:1 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "ML",
            'formula_id' => '790',
            'formula_short' => 'ME LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 2,
            'color' => "GOLD/YELLOW",
            'class' => "VIAL#2 1:10 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "ML",
            'formula_id' => '790',
            'formula_short' => 'ME LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 3,
            'color' => "BLUE",
            'class' => "VIAL#3 1:100 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "ML",
            'formula_id' => '790',
            'formula_short' => 'ME LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 4,
            'color' => "GREEN",
            'class' => "VIAL#4 1:1,000 V/V",
        ]);
        DB::table('label_matrices')->insert([
            'client_name' => 'LIFELINE',
            'formula_name' => "TGW (EXPERTUS EXPMIX) (5 VIALS) 1:1-1:10000 INJECTABLE",
            'speedcode' => "ML",
            'formula_id' => '790',
            'formula_short' => 'ME LIFEMIX',
            'num_of_vial' => 5,
            'vial' => 5,
            'color' => "SILVER/WHITE",
            'class' => "VIAL#5 1:10,000 V/V",
        ]);
    }
}