<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model {
    protected $fillable = [
        'url', 'item_id'
    ];
}
