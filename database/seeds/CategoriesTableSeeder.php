<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

	public $category_names = [
    'Tools',
	'Vacation'
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('categories')->delete();

    	foreach($this->category_names as $cName) {
    		DB::table('categories')->insert([
    			'name' => $cName,
    			]);
    	}
    }
}
