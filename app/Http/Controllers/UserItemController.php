<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserItemController extends Controller {

    public function index() {
    	return view('pages.user.items');
    }
}
