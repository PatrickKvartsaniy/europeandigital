<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.admin.includes.head')

<body>
@if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@yield('content')

@include('layouts.admin.includes.foot')

@include('layouts.admin.includes.footer')

@stack('scripts')

</body>
</html>
