<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Auth;

class UserController extends Controller {
    public function showItems($user_path) {
    	$items = Item::where('user_id', $this->getUserIdByUserPath($user_path))->get();

    	return view('pages.user.items', ['items' => $items, 'user_name' => $this->getUserNameByUserPath($user_path)]);
    }

    public function showFavorites($user_path) {
    	return view('pages.user.favorites', ['user_name' => $this->getUserNameByUserPath($user_path)]);
    }

    public function getUserNameByUserPath($user_path) {
    	return User::where('path', $user_path)->value('name');
    }

    public function getUserIdByUserPath($user_path) {
    	return User::where('path', $user_path)->value('id');
    }
}
