@extends('app.layouts')

@section('content')
    <main>
        <div class="mx-4">
            <div
                class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
            >
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        @lang('auth.register')
                    </h2>
                    <p class="mb-4">@lang('auth.create_account')</p>
                </header>

                @if(session()->has('message'))
                    <h1 class="bg-green-500 text-white text-center p-4">
                        {{ session('message') }}
                    </h1>
                    <br>
                @endif

                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">
                            @lang('auth.name')
                        </label>
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('name') border-red-500 @enderror"
                            name="name"
                            value="{{ old('name') }}"
                        />

                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2"
                            >@lang('auth.email')</label
                        >
                        <input
                            type="email"
                            class="border border-gray-200 rounded p-2 w-full
                            @error('email') border-red-500 @enderror"
                            name="email"
                            value="{{ old('email') }}"
                        />

                        @error('email')
                            <p class="text-red-500">{{ $message }}</p>
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
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="password_confirmation"
                            class="inline-block text-lg mb-2"
                        >
                           @lang('auth.repeat_password')
                        </label>
                        <input
                            type="password"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="password_confirmation"
                        />
                    </div>

                    <div class="mb-6">
                        <button
                            type="submit"
                            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                        >
                            @lang('auth.register')
                        </button>
                    </div>

                    <div class="mt-8">
                        <p>
                            @lang('auth.have_account')
                            <a href="/login" class="text-laravel"
                                >@lang('auth.login')</a
                            >
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection