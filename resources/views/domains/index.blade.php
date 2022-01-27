<x-priki.layout>
    <h1 class="text-center text-5xl py-3 font-bold">PRIKI</h1>
    <x-priki.dropdown-domains :practices=$practices :domains=$domains />
    <x-priki.practices :practices=$practices />
</x-priki.layout>
