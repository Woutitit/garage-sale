<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Services\MessageServiceInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ConversationRepositoryInterface;

class MessageController extends Controller 
{
    private $messageService, $user;

    public function __construct(MessageServiceInterface $messageService, UserRepositoryInterface $user, ConversationRepositoryInterface $conversation) 
    {
        $this->conversation = $conversation;
        $this->messageService = $messageService;
        $this->user = $user;
    }


    public function index() 
    {
        // Get messages by user ID
        var_dump($this->conversation->getConversationsByUserId(Auth::id()));

     
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // Store message
        $this->messageService->validateAndStore($request, [Auth::id(), $this->user->getIdByUserUrl($request->user_url)]);

        // Return back
        return redirect(url('/messages/t/' . $request->user_url));
    }


    public function show($user_url) 
    {
        // Return view with messages
        return view('pages.messages.show', [
            "messages" => $this->messageService->getMessages([Auth::id(), $this->user->getIdByUserUrl($user_url)]),
            "user_url" => $user_url
            ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
