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
		if($this->isFavourited($item_id)) {
			Favourite::where('item_id', $item_id)->where('user_id', Auth::id())->delete();
			return "deleted";
		} else {
			Favourite::create(["item_id" => $item_id, "user_id" => Auth::id()]);
			return "added";
		}
	}

	public function isFavourited($item_id)
	{
		$query = DB::table("favourites")->where('item_id', $item_id)->where('user_id', Auth::id())->first();

		if($query) {
			return true;
		} else {
			return false;
		}
	}

}