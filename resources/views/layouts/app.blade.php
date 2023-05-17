<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-head>
            @if (isset($head))
                {{ $head }}
            @endif
        </x-head>
    </head>
    <body>
                        {{ $slot }}

        <x-footer>
            @if (isset($footer))
                {{$footer}}
            @endif
        </x-footer>
        <x-scripts>
            @if (isset($scripts))
                {{ $scripts }}
            @endif
        </x-scripts>
    </body>
</html>