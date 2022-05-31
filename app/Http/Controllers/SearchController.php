<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){
        $search = $_GET['search'];
        $listings = Listing::where('title', 'like', '%'.$search.'%')
                    ->orWhere('tags', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->get();

        return view('other.search', [
            'listings' => $listings
        ]);
    }
}
