<?php 
namespace App\Repositories;

interface UserRepositoryInterface
{
	public function getUserByUserUrl($user_url, $fields);
	public function getIdByUserUrl($user_url);
}
