<?php

namespace App\Http\Controllers\Traveller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Traveller;
use Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Traveller::findOrFail(session('traveller_id'));
        $wishlists = Wishlist::where("traveller_id", "=", session('traveller_id'))->orderby('id', 'desc')->paginate(10);
        return view('traveller.pages.wishlist', compact('user', 'wishlists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'traveller_id'=>'required',
            'package_id' =>'required',
          ));

        $status=Wishlist::where('traveller_id',session('traveller_id'))
            ->where('package_id',$request->package_id)
            ->first();

            if(isset($status->traveller_id) and isset($request->package_id))
            {
                $status->delete();
                return response()->json(['success' => false, 'exists' => true,'message' => 'This Package removed from your wishlist!']);
            }
            else
            {
                $wishlist = new Wishlist;

                $wishlist->traveller_id = $request->traveller_id;
                $wishlist->package_id = $request->package_id;
                $wishlist->save();

                return response()->json(['success' => true, 'exists' => false, 'message' => 'Package, '. $wishlist->package->p_name.' Added to your wishlist.']);

            }
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->route('traveller.wishlist')->with('success', 'Package removed from wishlist successfully!');

    }
}
