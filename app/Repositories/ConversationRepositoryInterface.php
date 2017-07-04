<?php 
namespace App\Repositories;

interface ConversationRepositoryInterface
{
	public function findByUsersOrCreate($users);
}
