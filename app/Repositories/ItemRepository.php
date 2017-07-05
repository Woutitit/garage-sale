<?php 
namespace App\Repositories;

use Auth;
use DB;
use App\Favourite;
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
		$query = DB::table("favourites")->where('item_id', $item_id)->where('user_id', Auth::id())->first();

		if($query) {
			Favourite::where('item_id', $item_id)->where('user_id', Auth::id())->delete();
			return "added";
		} else {
			Favourite::create(["item_id" => $item_id, "user_id" => Auth::id()]);
			return "deleted";
		}
	}
}