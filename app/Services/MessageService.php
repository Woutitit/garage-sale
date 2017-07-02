<?php 
namespace App\Services;

use Auth;
use DB;
use App\Message;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Repositories\MessageRepositoryInterface;

class MessageService implements MessageServiceInterface
{
	use ValidatesRequests;

	private $message;

	public function __construct(MessageRepositoryInterface $message) 
	{
		$this->message = $message;
	}

	public function validateAndStore($request)
	{
		$this->validate($request, ['msg' => 'required']);

		// Check if conversation already exists by path
		// If conversation doesn't exist, check to how much people you've send a message
		// We should check to whom you send a message
		// Based on that we should check if their id's have the same conversation_id's as the sender
		// If 0 results then we know this conversation has not been created yet and we need to create one and return that ID
		// If 1 results (which should be the only possibilty) then we should only return the conversation_id
		DB::table("conversations_users")
		->select(DB::raw("COUNT(user_id), conversation_id "))
		->groupBy("conversation_id")
		->havingRaw("COUNT(user_id) = 3")
		->get();	

		$this->message->save([
			"message" => $request->msg,
			"user_id" => Auth::id(),
			"conversation_id" => 1,
			]);
	}
}