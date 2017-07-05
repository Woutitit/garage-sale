<?php 
namespace App\Repositories;

interface ItemRepositoryInterface
{
	public function findItemsByQuery($query);
	public function createOrDeleteFavouriteByItemId($item_id);
}
