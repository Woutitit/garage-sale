<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Services\MessageServiceInterface;
use App\Repositories\UserRepositoryInterface;

class MessageController extends Controller 
{
    private $messageService, $user;

    public function __construct(MessageServiceInterface $messageService, UserRepositoryInterface $user) 
    {
        $this->messageService = $messageService;
        $this->user = $user;
    }


    public function index() 
    {
        return view('pages.messages.index');
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
        // Get messages
        $this->messageService->getMessages([Auth::id(), $this->user->getIdByUserUrl($user_url)]);

        // Return view with data
        return view('pages.messages.show', ["user_url" => $user_url]);
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
