<x-priki.layout>
    <h1 class="text-center text-5xl py-3 font-bold">PRIKI</h1>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                    <path
                        d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                </svg>
                <h2 class="text-gray-900 title-font tracking-wider text-2xl pb-3">{{$practice->domain->name}}</h2>
                <p class="text-gray-500 italic">Publiée par {{$practice->user->fullname.' le '.$practice->created_at->translatedFormat('l jS F Y')}}</p>
                <p class="leading-relaxed text-lg">{{$practice->description}}</p>
                <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                <p class="text-gray-500 italic">Dernière mise à jour : le {{ $practice->updated_at->translatedFormat('l jS F Y')}}</p>
            </div>
        </div>
    </section>

    @if(!$hasPublished)
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Exprimez votre OPINION</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Votre opinion nous intéresse</p>
                </div>
                <form method="POST" action="{{ route('opinion.store', ['id' => $practice->id] )}}">
                    @csrf
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="opinion" class="leading-7 text-sm text-gray-600">Opinion</label>
                                    <textarea name="opinion" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <input type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" value="Submit" />
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            </div>
        </section>
    @else
        @can('update',$practice)
            <form class="flex flex-row justify-center items-center"
                  action="{{ route('practices.update', ['id' => $practice->id] ) }}" method="post">
                @csrf
                @method('put')
                <button
                    class="bg-gray-200 inline-flex py-3 px-5 rounded-lg items-center lg:ml-4 md:ml-0 ml-4 md:mt-4 mt-0 lg:mt-0 hover:bg-gray-400 focus:outline-none">
                    <span class="title-font font-medium">Publier</span>
                </button>
            </form>
        @endcan
    @endif
</x-priki.layout>
