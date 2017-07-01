<?php 
namespace App\Repositories;
use App\Item;

class ItemRepository 
{
	public function findItemsByQuery($query)
	{
		return Item::where('name', 'LIKE', '%'.$query.'%')
		->orWhere('description', '%'.$query.'%')
		->get();
	}
}