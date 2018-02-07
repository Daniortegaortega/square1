<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WishList;
use Illuminate\Support\Facades\DB;


class WishListController extends Controller
{
	public function show()
	{

		$list = WishList::all();

		return view('wishlist', compact('list'));
	}

	public function store()
    {
        $this->validate(request(), [
            'id_user' => 'required|max:100', 
            'product' => 'required|max:500|unique:wish_lists',
            'precio' => 'required|max:100',
        ]);


        WishList::create(request()->all());
        return back();
    }
    public function destroy($id,$prod)
    {
    	$produ = DB::table('wish_lists')->where('id_user', '=', $id)->where('product','=',$prod)->delete();
    	return back();
    }
}
