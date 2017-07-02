<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\ItemImage;
use Auth;
use App\Repositories\ItemRepositoryInterface;

class ItemController extends Controller {

    private $item;

    public function __construct(ItemRepositoryInterface $item) 
    {
        $this->item = $item;
    }

    public function index(Request $request) 
    {
        return view('pages.items.index', ["items" => $this->item->findItemsByQuery($request->query('q'))]);
    }

    public function create() 
    {
        return view('pages.items.create', ['categories' => Category::all()->sortBy("name")]);
    }

    public function store(Request $request)
    {
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
        // TODO: Join with ItemImages table too
        $itemDetails = Item::join('users', 'items.user_id', 'users.id')
        ->where('items.id', $id)
        ->first([
            'items.id AS item_id',
            'items.name AS item_name',
            'items.price',
            'items.description',
            'users.id AS user_id',
            'users.name AS user_name',
            'users.path AS user_url'
            ]);

        return view('pages.items.show', ['itemDetails' => $itemDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $categories = Category::all()->sortBy("name");

        return view('pages.items.edit', ['categories' => $categories, 'item' => Item::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
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

        // update item in DB and get ID
        $this->updateItem($request, $id);

        // Delete all current images from uploads folder and DB
        ItemImage::where('item_id', $id)->delete();

        // Upload new images and store in DB
        $this->uploadPicturesAndStoreInDB([
            $request->file('picture_1'), 
            $request->file('picture_2'), 
            $request->file('picture_3')
            ], $id);

        // Redirect to user items with flash message
        return redirect(url('/items/' . $id));
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
            'category' => $request->category,
            'user_id' => Auth::id()
            ])->id;
    }

    public function updateItem(Request $request, $id) {

        $item = Item::find($id);

        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->category = $request->category;
        $item->user_id = Auth::id();

        $item->save();
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
