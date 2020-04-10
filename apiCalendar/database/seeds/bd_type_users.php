<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bd_type_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typesUsers = array("administrator", "employer", "designed");
        

        for ($i=0; $i < count($typesUsers); $i++) { 
            $int = rand(0,51);
            $int2 = rand(10,31);

            $a_z = "ABCDEF123546789QRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $rand_letter = $a_z[$int] . $a_z[$int2] . $i;
            //return $rand_letter;
            DB::table('bd_type_users')->insert([
                'type_user' => $typesUsers[$i],
                'status' => true,
                'code' => $rand_letter,
            ]);

        }
       
    }
}
