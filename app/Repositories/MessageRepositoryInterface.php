<?php 
namespace App\Repositories;

interface MessageRepositoryInterface
{
	public function findMessagesByConversationId($conversation_id);
	public function save($data);
}
