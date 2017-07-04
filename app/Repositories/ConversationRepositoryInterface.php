<?php 
namespace App\Repositories;

interface ConversationRepositoryInterface
{
	public function getConversationIdByUserIds($user_ids);
	public function findByUsersOrCreate($users);
}
