<?php 
namespace App\Services;

use Auth;
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

		// If validation passes
		$this->message->save([
			"message" => $request->msg,
			"user_id" => Auth::id(),
			"conversation_id" => 1,
			]);
	}
}