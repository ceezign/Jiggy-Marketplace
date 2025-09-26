@props(['title' => '', 'bodyClass' => null])


<x-base-layout :$title :bodyClass>
    <x-layouts.header />
    {{ $slot }}
    <x-layouts.footer />
</x-base-layout>