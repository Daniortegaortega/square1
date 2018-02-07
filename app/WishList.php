<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
	protected $table = 'wish_lists';
	
	protected $fillable = [
        'id_user', 'product', 'precio',
    ];
    
    
}
