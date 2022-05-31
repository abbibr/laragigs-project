@extends('app.layouts')

@section('content')
    <main>
        <!-- Search -->
        <form action="">
            <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                <div class="absolute top-4 left-3">
                    <i
                        class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                    ></i>
                </div>
                <input
                    type="text"
                    name="search"
                    class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                    placeholder="Search Laravel Gigs..."
                />
                <div class="absolute top-2 right-2">
                    <button
                        type="submit"
                        class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                    >
                        Search
                    </button>
                </div>
            </div>
        </form>
        <a href="/" class="inline-block text-black ml-4 mb-4"
            ><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                <div
                    class="flex flex-col items-center justify-center text-center"
                >
                    <img
                        class="w-48 mr-6 mb-6"
                        src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                        alt=""
                    />

                    <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                    <div class="text-xl font-bold mb-2">{{ $listing->company_name }}</div>
                    <h4 class="text-xl mb-4">Posted ({{ $listing->created_at->diffForHumans() }})</h4>
                    
                    <x-tags-component :tagsCsv="$listing->tags" />

                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="text-lg space-y-6">
                            <p>
                                {{ $listing->description }}
                            </p>

                            <a
                                href="mailto:{{ $listing->email }}"
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-envelope"></i>
                                Contact Employer</a
                            >

                            <a
                                href="{{ $listing->website }}"
                                target="_blank"
                                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-globe"></i> Visit
                                Website</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection