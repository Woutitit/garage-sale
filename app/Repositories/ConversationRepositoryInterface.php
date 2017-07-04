<?php 
namespace App\Repositories;

interface ConversationRepositoryInterface
{
	public function findOrCreateByUsers($users);
}
