<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('create', 'edit', 'manage');
    }

    public function index(){
        $listings = Listing::latest()->filter(request(['tag']))->with(['user'])->paginate(6);

        return view('index', [
            'listings' => $listings
        ]);
    }

    public function show(Listing $listing){
        return view('show', [
            'listing' => $listing
        ]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'sometimes|image:jpg, jpeg, png'
        ]);

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $path = $image->store('logos', 'public');

            $listing = new Listing();

            $listing->title = $request->title;
            $listing->user_id = auth()->user()->id;
            $listing->tags = $request->tags;
            $listing->company = $request->company;
            $listing->location = $request->location;
            $listing->email = $request->email;
            $listing->website = $request->website;
            $listing->description = $request->description;
            $listing->logo = $path;
    
            $listing->save();
        }
        else{
            $listing = new Listing();

            $listing->title = $request->title;
            $listing->user_id = auth()->user()->id;
            $listing->tags = $request->tags;
            $listing->company = $request->company;
            $listing->location = $request->location;
            $listing->email = $request->email;
            $listing->website = $request->website;
            $listing->description = $request->description;
    
            $listing->save();
        }

        return redirect()->back()->with('message','New post successfully created');
    }

    public function edit(Listing $listing){
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized');
        }

        return view('edit', [
            'listing' => $listing
        ]);
    }

    public function update(Request $request, Listing $listing){
        $this->validate($request, [
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'sometimes|image:jpg, jpeg, png'
        ]);

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $path = $image->store('logos','public');

            $listing->title = $request->title;
            $listing->user_id = auth()->user()->id;
            $listing->tags = $request->tags;
            $listing->company = $request->company;
            $listing->location = $request->location;
            $listing->email = $request->email;
            $listing->website = $request->website;
            $listing->description = $request->description;
            $listing->logo = $path;
    
            $listing->update();
        }
        else{
            $listing->title = $request->title;
            $listing->user_id = auth()->user()->id;
            $listing->tags = $request->tags;
            $listing->company = $request->company;
            $listing->location = $request->location;
            $listing->email = $request->email;
            $listing->website = $request->website;
            $listing->description = $request->description;
    
            $listing->update();
        }

        return redirect()->back()->with('message','This post successfully updated');
    }

    public function destroy(Listing $listing){
        if($listing->user_id !== auth()->id()){
            abort('403', 'Unauthorized');
        }

        $listing->delete();
        return redirect()->back()->with('message','This post successfully deleted');
    }

    public function manage(){
        $listings = auth()->user()->listing;

        return view('other.manage', [
            'listings' => $listings
        ]);
    }
}
