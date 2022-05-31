<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'edit']);
    }

    public function index(){
        $listings = Listing::all();

        /* if(!Gate::allows('view-posts')){
            abort(403, 'Unauthorized');
        } */

        /* if(Gate::denies('view-posts')){
            abort(403);
        } */

        $this->authorize('view-posts');

        return view('other.admin-manage', compact('listings'));
    }

    public function edit(Listing $listing){
        if(Gate::denies('update-post', $listing)){
            abort(403, 'Unauthorized');
        }

        return view('admin-edit', [
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
        $listing->delete();

        if(!Gate::allows('delete-post', $listing)){
            abort(403, 'Unauthorized');
        }

        return redirect()->back()->with('message','This post successfully deleted');
    }
}
