<?php 
namespace App\Repositories;

use DB;
use App\Conversation;

class ConversationRepository implements ConversationRepositoryInterface
{
	public function findOrCreateByUsers($users)
	{
		$query = DB::table("conversation_user")
		->select(DB::raw("COUNT(user_id), conversation_id"));

		foreach($users as $user_id) 
		{
			$query->orWhere("user_id", $user_id);
		}

		$query = $query->groupBy("conversation_id")->havingRaw("COUNT(user_id) =" . count($users) )->first();

		// Create new conversation and/or get ID
		if(count($query) === 1) 
		{
			return $query->id;
		} 
		else 
		{
			return Conversation::create();
		}
	}
}