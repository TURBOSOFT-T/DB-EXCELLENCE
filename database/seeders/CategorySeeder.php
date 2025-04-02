<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
	public function run()
	{
        $categories = [
			[
				'title' => 'Categorie 1',
				'slug'  => 'category-1',
			],
			[
				'title' => 'Categorie 2',
				'slug'  => 'category-2',
			],
			[
				'title' => 'Categorie 3',
				'slug'  => 'category-3',
			],
		];

        foreach ($categories as $categoryData) {
			Category::create($categoryData);
		}
	}
}

