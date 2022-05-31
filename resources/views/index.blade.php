@extends('app.layouts')

@section('content')
            <!-- Hero -->
        <section
            class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
        >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('images/laravel-logo.png')"
            ></div>

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                    Lara<span class="text-black">Gigs</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Find or post Laravel jobs & projects
                </p>

                @if (!auth()->user())
                    <div>
                        <a
                            href="/register"
                            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                            >Sign Up to List a Gig</a
                        >
                    </div>                    
                @endif

            </div>
        </section>

        <main>
            <!-- Search -->
            <form action="{{ route('search') }}" method="GET">
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

            <div
                class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
            >
                @forelse ($listings as $listing)
                    <x-listing-component :listing="$listing" />
                @empty
                    <h1>There are not any listings!</h1>
                @endforelse
            </div>

            <div class="m-5">
                {{ $listings->links() }}
            </div>
        </main>
@endsection