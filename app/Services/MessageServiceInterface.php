<?php 
namespace App\Services;

interface MessageServiceInterface
{
	public function getMessages(array $user_ids);

	public function validateAndStore($request, array $users);
}
