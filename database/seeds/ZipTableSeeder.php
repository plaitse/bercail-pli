<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class ZipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



    	// dd(__FILE__);
		$row = 0;
		if (($handle = fopen(dirname(__FILE__)."/zip_clean.csv", "r")) !== FALSE) {
        	// log file pour les zip qui bug
			$fp = fopen(dirname(__FILE__)."/bugs.txt", "w+");

		    while (($data = fgetcsv($handle, 100000, ";")) !== FALSE) {
		    	echo $row. PHP_EOL;
		        $row++;
		    	// $zipCheck = DB::table('zip')->where('Code_postal', $data[])->first();
		    	// if ($zipCheck == NULL || $zipCheck->INSEE_COM != $data[0]) {
			        if ($data[0] != 'Code_commune_INSEE'){
		            	$getZipInfosFromLogicImmo = file_get_contents("http://www.logic-immo.com/asset/t9/getLocalityT9.php/?site=fr&lang=fr&json=".$data[2]);
		    	        $getZipInfosFromLogicImmo = json_decode($getZipInfosFromLogicImmo);

				        if (isset($getZipInfosFromLogicImmo[0]->children[0])){
		            		echo 'ok '.$getZipInfosFromLogicImmo[0]->children[0]->lct_post_code. PHP_EOL;
					        DB::table('zip')->insert([
					        	'Code_postal' => $data[2],
								'INSEE_COM' => $data[0],
								'NOM_COM' => $data[1],
								// 'NOM_DEPT' => $data[2],
								// 'NOM_REG' => $data[3],
								'lct_id' => $getZipInfosFromLogicImmo[0]->children[0]->lct_id,
								'lct_parent_id' => $getZipInfosFromLogicImmo[0]->children[0]->lct_parent_id,
								'lct_parent' => $getZipInfosFromLogicImmo[0]->children[0]->lct_parent,
								'lct_name' => $getZipInfosFromLogicImmo[0]->children[0]->lct_name,
								'lct_post_code' => $getZipInfosFromLogicImmo[0]->children[0]->lct_post_code,
								'lct_level' => $getZipInfosFromLogicImmo[0]->children[0]->lct_level,
								'lct_count' => $getZipInfosFromLogicImmo[0]->children[0]->lct_count
					        ]);
				        }
				        else {
				        	// echo '"'.$data[0].'" => "'.$data[2].' - '.$data[1].' - '.$data[2].' - '.$data[3]. PHP_EOL;
				        	echo "BUUUUUUUUUUUG".$data[2]. PHP_EOL;
					        DB::table('zip')->insert([
					        	'Code_postal' => $data[2],
								'INSEE_COM' => $data[0],
								'NOM_COM' => $data[1]//,
								// 'NOM_DEPT' => $data[2],
								// 'NOM_REG' => $data[3]
					        ]);

							fputs($fp, $data[2]."\n");
				        }
			            // usleep(10000);
			        }
		    	// }
		    	// else{
		    	// 	echo "Zip déja record.". PHP_EOL;
		    	// }
		    }
		    fclose($handle);
			fclose($fp);
		    echo "fini";


		}
    }
}
