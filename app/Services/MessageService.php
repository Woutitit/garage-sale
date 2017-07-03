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

	public function validateAndStore($request, array $users)
	{
		$this->validate($request, ['msg' => 'required']);

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
			echo "YAY!";	
		} 
		else 
		{
			echo "NAY!";
		}

		// $this->message->save(["message" => $request->msg, "user_id" => Auth::id(), "conversation_id" => 1]); 
	}
}