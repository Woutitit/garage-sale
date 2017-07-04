<?php 
namespace App\Repositories;

interface ConversationRepositoryInterface
{
	public function getConversationsByUserId($user_id);
	public function getConversationIdByUserIds($user_ids);
	public function findByUsersOrCreate($users);
}
