@extends('app.layouts')

@section('content')
    <main>
        <div class="mx-4">
            <div
                class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
            >
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Edit Gig
                    </h2>
                    <p class="mb-4">Edit: {{ $listing->title }}</p>
                </header>

                @if(session()->has('message'))
                    <h1 class="bg-yellow-500 text-white text-center p-4">
                        {{ session('message') }}
                    </h1>
                    <br>
                @endif

                <form action="{{ route('update', $listing->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-6">
                        <label
                            for="company"
                            class="inline-block text-lg mb-2"
                            >Company Name</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('company') border-red-500 @enderror"
                            name="company"
                            value="{{ $listing->company }}"
                            placeholder="Example: abbibr"
                        />

                        @error('company')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2"
                            >Job Title</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('title') border-red-500 @enderror"
                            name="title"
                            placeholder="Example: Senior Laravel Developer"
                            value="{{ $listing->title }}"
                        />

                        @error('title')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="location"
                            class="inline-block text-lg mb-2"
                            >Job Location</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('location') border-red-500 @enderror"
                            name="location"
                            placeholder="Example: Remote, Boston MA, etc"
                            value="{{ $listing->location }}"
                        />

                        @error('location')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2"
                            >Contact Email</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('email') border-red-500 @enderror"
                            name="email"
                            value="{{ $listing->email }}"
                        />

                        @error('email')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="website"
                            class="inline-block text-lg mb-2"
                        >
                            Website/Application URL
                        </label>
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('website') border-red-500 @enderror"
                            name="website"
                            value="{{ $listing->website }}"
                        />

                        @error('website')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tags" class="inline-block text-lg mb-2">
                            Tags (Comma Separated)
                        </label>
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('tags') border-red-500 @enderror"
                            name="tags"
                            placeholder="Example: Laravel, Backend, Postgres, etc"
                            value="{{ $listing->tags }}"
                        />

                        @error('tags')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="logo" class="inline-block text-lg mb-2">
                            Company Logo
                        </label>
                        <input
                            type="file"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="logo"
                        />
                    </div>

                    <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}" style="width: 50%;">

                    <div class="mb-6">
                        <label
                            for="description"
                            class="inline-block text-lg mb-2"
                        >
                            Job Description
                        </label>
                        <textarea
                            class="border border-gray-200 rounded p-2 w-full
                            @error('description') border-red-500 @enderror"
                            name="description"
                            rows="10"
                            placeholder="Include tasks, requirements, salary, etc"
                        >
                            {{ $listing->description }}
                        </textarea
                        >

                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button
                            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black text-lg"
                        >
                            Update Gig
                        </button>

                        <a href="/" class="text-black ml-4">
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection