<?php 
namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
	public function getIdByUserUrl($user_url)
	{
		return User::where('path', $user_url)->value("id");
	}
}