<x-priki.layout>
    <x-priki.message-success/>
    <h1 class="text-center text-5xl py-3 font-bold">PRIKI</h1>
    <form class="p-2 w-full" method="get" action="{{ route('references.create')}}">
        <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
            Ajouter une référence
        </button>
    </form>
    <x-priki.references :references=$references />

</x-priki.layout>
