@extends('app.layouts')

@section('content')    
    <main>
        <div class="mx-4">
            <div
                class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
            >
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        @lang('auth.login')
                    </h2>
                    <p class="mb-4">@lang('auth.login_account')</p>
                </header>

                @if(session()->has('message'))
                    <h1 class="bg-red-500 text-white text-center p-4">
                        {{ session('message') }}
                    </h1>
                    <br>
                @endif

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2"
                            >@lang('auth.email')</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('email') border-red-500 @enderror"
                            name="email"
                            value="{{ old('email') }}"
                        />

                        @error('email')
                            <p class="text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="password"
                            class="inline-block text-lg mb-2"
                        >
                            @lang('auth.password')
                        </label>
                        <input
                            type="password"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('password') border-red-500 @enderror"
                            name="password"
                            value="{{ old('password') }}"
                        />

                        @error('password')
                            <p class="text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button
                            type="submit"
                            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                        >
                            @lang('auth.login')
                        </button>
                    </div>

                    <div class="mt-8">
                        <p>
                            @lang('auth.no_account')
                            <a href="/register" class="text-laravel"
                                >@lang('auth.register')</a
                            >
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection