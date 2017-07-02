<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Services\MessageServiceInterface;

class MessageController extends Controller 
{
    private $messageService; 

    public function __construct(MessageServiceInterface $messageService) 
    {
        $this->messageService = $messageService;
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
        $this->messageService->validateAndStore($request);
        return redirect(url('/messages'));
    }

    public function show($user_url) {

        /*

        $conversationDetails = User::join('messages', 'messages.user_id', 'users.id')
        ->where('users.path', $user_url)
        ->where('users.id', Auth::id())
        ->get();

        */

        return view('pages.messages.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
