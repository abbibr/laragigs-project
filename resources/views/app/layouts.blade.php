<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <title>LaraGigs | Find Laravel Jobs & Projects</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="index.html"
                ><img class="w-24" src="images/logo.png" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                    <li>
                        <a href="" class="hover:text-laravel"
                            ><i class="fa-solid fa-gear"></i> 
                            @lang('auth.welcome') {{ auth()->user()->name }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('manage') }}" class="hover:text-laravel"
                            ><i class="fa-solid fa-gear"></i> Manage Gigs</a
                        >
                    </li>

                    @can('view-posts')
                        <li>
                            <a href="{{ route('admin.index') }}" class="hover:text-laravel"
                                ><i class="fa-solid fa-gear"></i> All Posts</a
                            >
                        </li>
                    @endcan

                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-door-closed"></i>
                                @lang('auth.logout')
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('register') }}" class="hover:text-laravel"
                            ><i class="fa-solid fa-user-plus"></i> @lang('auth.register')</a
                        >
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel"
                            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            @lang('auth.login')</a
                        >
                    </li>
                @endguest

                <li class="nav-item dropdown ">
                    {{-- <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        {{ Config::get('languages')[App::getLocale()] }}
                    </a> --}}

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                    {{ $language }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </nav>

        @yield('content')

        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a
                href="{{ route('create') }}"
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >@lang('auth.post_job')</a
            >
        </footer>
    </body>
</html>
