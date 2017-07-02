<?php 
namespace App\Repositories;

use App\Item;

class ItemRepository implements ItemRepositoryInterface
{
	public function findItemsByQuery($query)
	{
		return Item::where('name', 'LIKE', '%'.$query.'%')
		->orWhere('description', 'LIKE', '%'.$query.'%')
		->get();
	}
}