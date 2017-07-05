<?php 
namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
	public function getUserByUserUrl($user_url, $fields = '')
	{
		return User::where('path', $user_url)->first($fields);
	}


	public function getIdByUserUrl($user_url)
	{
		return User::where('path', $user_url)->value("id");
	}
}