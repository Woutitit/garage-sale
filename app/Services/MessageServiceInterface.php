<?php 
namespace App\Services;

interface MessageServiceInterface
{
	public function validateAndStore($request, array $users);
}
