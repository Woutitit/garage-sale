<?php 
namespace App\Repositories;

use App\Message;

class MessageRepository implements MessageRepositoryInterface
{
	public function findMessagesByConversationId($conversation_id)
	{
		return Message::where('conversation_id', 9)->get();
	}

	public function save($data)
	{
		Message::create($data);
	}
}