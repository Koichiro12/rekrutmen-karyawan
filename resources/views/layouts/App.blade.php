@include('partials.header')
<div id="app">
    @include('partials.sidebar')
    <div id="main">
        @include('partials.navbar')
        <div class="page-content">
            @yield('content')
        </div>
        @include('partials.foot')
    </div>
</div>
@include('partials.footer')
