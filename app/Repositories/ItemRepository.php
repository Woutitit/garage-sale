<?php 
namespace App\Repositories;

use Auth;
use DB;
use App\Item;

class ItemRepository implements ItemRepositoryInterface
{
	public function findItemsByQuery($query)
	{
		return Item::where('name', 'LIKE', '%'.$query.'%')
		->orWhere('description', 'LIKE', '%'.$query.'%')
		->get();
	}

	public function createOrDeleteFavouriteByItemId($item_id)
	{
		$query = DB::table("favourites")->where('user_id', Auth::id())->where('item_id', $item_id)->first();

		if($query) {
			return "LOL";
		} else {
			return "LEL";
		}
	}
}