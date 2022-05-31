@extends('app.layouts')

@section('content')
    <main>
            <div class="mx-4">
                <div
                    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Create a Gig
                        </h2>
                        <p class="mb-4">Post a gig to find a developer</p>
                    </header>

                    @if(session()->has('message'))
                        <h1 class="bg-green-500 text-white text-center p-4">
                            {{ session('message') }}
                        </h1>
                        <br>
                    @endif

                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                placeholder="Example: abbibr"
                                value="{{ old('company') }}"
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
                                value="{{ old('title') }}"
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
                                value="{{ old('location') }}"
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
                                placeholder="Example: ibrohim_abbosov@mail.ru"
                                value="{{ old('email') }}"
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
                                placeholder="Example: https://abbibr.uz"
                                value="{{ old('website') }}"
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
                                value="{{ old('tags') }}"
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
                                value="{{ old('description') }}"
                            ></textarea>

                            @error('description')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Create Gig
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </div>
            </div>
    </main>
@endsection