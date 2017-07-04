<?php 
namespace App\Services;

use Auth;
use DB;
use App\Message;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Repositories\MessageRepositoryInterface;
use App\Repositories\ConversationRepositoryInterface;

class MessageService implements MessageServiceInterface
{
	use ValidatesRequests;

	private $conversation, $message;

	public function __construct(MessageRepositoryInterface $message, ConversationRepositoryInterface $conversation) 
	{
		$this->conversation = $conversation;
		$this->message = $message;
	}

	public function getMessages(array $user_ids) 
	{
		// Get conversation ID
        $conversation_id = $this->conversation->getConversationIdByUserIds($user_ids);

        // Find messages by conversation ID
        $this->message->findByConversationId();
	}

	public function validateAndStore($request, array $users)
	{
		// Validate message
		$this->validate($request, ['msg' => 'required']);

		// Create and/get conversation ID
		$conversation_id = $this->conversation->findByUsersOrCreate($users);

		// Create message
		$this->message->save(["message" => $request->msg, "user_id" => Auth::id(), "conversation_id" => $conversation_id]); 
	}
}