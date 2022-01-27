<x-priki.layout>
    <h1 class="text-center text-5xl py-3 font-bold">PRIKI</h1>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <h3 class="title-font sm:text-4xl text-xl font-medium text-gray-900 mb-3 italic font-bold">"{{$practice->title}}"</h3>
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
