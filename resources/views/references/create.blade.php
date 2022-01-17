<x-layout>
    @if ($message = Session::get('error'))
        <div class="font-medium text-sm text-red-600 bg-red-200 p-4">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h1 class="text-center text-5xl py-3 font-bold">PRIKI</h1>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-4 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Ajouter une référence</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Afin d’enrichir le débat .</p>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form method="post" action="{{route('references.store')}}" class="flex flex-wrap -m-2">
                    @csrf
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="description" class="leading-7 text-sm text-gray-600">Titre</label>
                            <input type="text" id="description" name="description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">URL</label>
                            <input type="url" id="url" name="url" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
