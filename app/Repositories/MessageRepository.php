<?php 
namespace App\Repositories;

use App\Message;

class MessageRepository implements MessageRepositoryInterface
{
	public function save($data)
	{
		Message::create($data);
	}
}