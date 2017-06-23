<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

	public $category_names = [
	'Strand'
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	foreach($this->category_names as $cName) {
    		DB::table('categories')->insert([
    			'name' => $cName,
    			]);
    	}
    }
}
