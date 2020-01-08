<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
<body>
    <div id="app">
        @include('layouts.nav')
        <main class="py-4">
            <div class="container">
                @include('layouts.messages')
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
