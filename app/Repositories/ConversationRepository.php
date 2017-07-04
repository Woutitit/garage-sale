<?php 
namespace App\Repositories;

use Auth;
use DB;
use App\Conversation;
use App\ConversationUser;

class ConversationRepository implements ConversationRepositoryInterface
{
	public function getConversationsByUserId($user_id) {
		// We should get all conversation in conversation_user that have this user_id 
		// + per conversation we should get ALL conversation members
		return ConversationUser::join('conversations', 'conversation_user.conversation_id', 'conversations.id')
		->where('user_id', $user_id)
		->get(['conversations.name']);
	}


	public function getConversationIdByUserIds($user_ids) 
	{
		$query = DB::table("conversation_user")
		->select(DB::raw("COUNT(user_id), conversation_id"));

		foreach($user_ids as $user_id) 
		{
			$query->orWhere("user_id", $user_id);
		}

		$query = $query->groupBy("conversation_id")->havingRaw("COUNT(user_id) =" . count($user_ids) )->first();

		if(count($query) === 1) 
		{
			return $query->conversation_id;
		} 
		else 
		{
			return false;
		}
	}


	public function findByUsersOrCreate($user_ids)
	{

		if($this->getConversationIdByUserIds($user_ids))
		{
			return $this->getConversationIdByUserIds($user_ids);
		} 
		else 
		{
			// TODO LOOK UP USERNAMES BY ID AND EXCLUDE OWN ID
			$conversation_name = DB::table("users");

			foreach($user_ids as $user_id) {
				if($user_id === Auth::user()->id) 
				{
					$conversation_name->where('id', '!=', $user_id);
				}
				else 
				{
					$conversation_name->where('id', $user_id);
				}
			}

			$conversation_name = implode(",", $conversation_name->pluck('name')->toArray());
			

			$conversation_id = Conversation::create(["name" => $conversation_name])->id;

			foreach($user_ids as $user_id)
			{
				ConversationUser::create(["conversation_id" => $conversation_id, "user_id" => $user_id]);
			}

			return $conversation_id;
		}
	}
}