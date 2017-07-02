<?php 
namespace App\Repositories;

interface ItemRepositoryInterface
{
	public function findItemsByQuery($query);
}
