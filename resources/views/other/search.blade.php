@extends('app.layouts')

@section('content')
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    
    @forelse ($listings as $listing)
        <x-listing-component :listing="$listing" />
    @empty
        <h1>We do not find any listings!</h1>
    @endforelse
@endsection