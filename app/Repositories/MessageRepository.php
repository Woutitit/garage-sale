<?php 
namespace App\Repositories;

use App\Message;

class MessageRepository implements MessageRepositoryInterface
{
	public function findMessagesByConversationId($conversation_id)
	{
		var_dump($conversation_id);
	}

	public function save($data)
	{
		Message::create($data);
	}
}