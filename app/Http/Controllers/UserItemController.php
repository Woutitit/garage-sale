<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;

class UserItemController extends Controller {

    public function index() {

    	Item::where('user_id', Auth::id())->get();
    	return view('pages.user.items');
    }
}
