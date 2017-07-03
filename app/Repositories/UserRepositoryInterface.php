<?php 
namespace App\Repositories;

interface UserRepositoryInterface
{
	public function getIdByUserUrl($user_url);
}
