<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
	public function run()
	{
		


		$cat = new Setting();
		//  $cat->frais = '15';
		  $cat->description = 'Notre équipe de football Les Aigles est une équipe dynamique et talentueuse, connue pour son esprit de compétition et son jeu passionné. Fondée en 1990, notre équipe a rapidement gravi les échelons pour devenir une des équipes les plus respectées de la ligue.';
		 $cat->telephone= '56399165';
		 $cat->email='shopping@gmail.com';
		 $cat->addresse='Tunis  Avenue Mohamed Melki 1005 El Omrane';
  
		  $cat->save(); 
	}
}
