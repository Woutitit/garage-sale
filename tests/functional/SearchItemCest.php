<?php

use App\Item;
use Illuminate\Support\Facades\Artisan;

class SearchItemCest {
	public function _before(FunctionalTester $I) {

	}

	public function _after(FunctionalTester $I) {
	}

    // tests
	public function testUserCanFindItemByTitle (FunctionalTester $I) {

		$item = factory(Item::class)->create([
			'name' => 'mower',
			'price' => '50'
			]);

		$I->amOnPage('/');
		$I->submitForm('form#searchItem', ['q' => 'mower']);
		$I->seeCurrentUrlEquals('/search?q=mower');
		$I->see('mower');
		$I->see('50');
	}
}