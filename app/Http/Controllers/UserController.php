<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;

class UserController extends Controller {
    public function showItems() {
    	$items = Item::where('user_id', Auth::id())->get();

    	return view('pages.user.items', [ 'items' => $items ]);
    }

    public function showFavorites() {
    	return view('pages.user.favorites');
    }
}
