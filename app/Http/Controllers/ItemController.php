<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\ItemImage;
use Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $categories = Category::all()->sortBy("name");

        return view('pages.items.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // Validate input
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'picture_1' => 'required',
            'picture_2' => 'sometimes',
            'picture_3' => 'sometimes',
            ]);

        // Store item in DB and get ID
        $itemId = $this->createItemAndGetId($request);

        // Upload images and store in DB
        $this->uploadPicturesAndStoreInDB([
            $request->file('picture_1'), 
            $request->file('picture_2'), 
            $request->file('picture_3')
            ], $itemId);

        // Redirect to user items with flash message
        return redirect(url(Auth::user()->path . '/items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function createItemAndGetId(Request $request) {
        return Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category
            ])->id;
    }

    public function uploadPicturesAndStoreInDB(array $pictures, $id) {
        foreach ($pictures as $picture) {
            if($picture) {
                // Create unique image name
                $image_name = time() . "-" . $picture->getClientOriginalName();

                // Move the image to the correct folder
                $picture->move('uploads/items', $image_name);

                // Store in DB
                ItemImage::create([
                    'url' => $image_name,
                    'item_id' => $id,
                    ]);
            }
        }
    }
}
