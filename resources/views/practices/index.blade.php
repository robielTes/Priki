<x-priki.layout>
    <h1 class="text-center text-5xl py-3 font-bold">PRIKI</h1>
    <div class="text-center text-xl pb-6">
    </div>

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
                <div class="py-8 flex flex-wrap md:flex-nowrap">
                @forelse($practicesDomains as $practices)
                    <div>
                        <div class="md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                            <span class="font-semibold title-font text-gray-700 text-6xl">{{$practices->first()->domain->name}}</span>
                        </div>
                       <div class="md:flex-grow">
                           <div class="flex flex-wrap my-4 py-8 border-t-4 border-gray-300">
                               @foreach($practices as $practice)
                                   <div class="p-4 lg:w-1/3">
                                       <div
                                           class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                                           <h3 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3 italic font-bold">"{{$practice->title}}"</h3>
                                           <h2 class="text-xs font-medium italic text-gray-400 mb-1">{{ $practice->updated_at->translatedFormat('jS F Y')}}</h2>
                                           <p class="mb-3 prikiDescription">{{$practice->description}}</p>
                                           <a href="{{ route('practices.state.edit', ['id' => $practice->id] ) }}">
                                               <button
                                                   class="bg-gray-200 inline-flex py-3 px-5 rounded-lg items-center lg:ml-4 md:ml-0 ml-4 md:mt-4 mt-0 lg:mt-0 hover:bg-gray-400 focus:outline-none">
                                                   <span class="title-font font-medium">{{$practice->publicationState->name}}</span>
                                               </button>
                                           </a>
                                       </div>
                                   </div>

                               @endforeach
                               @empty
                                   <h3 class="text-center">Aucune pratique à afficher ici</h3>
                           </div>
                       </div>
                    </div>
                @endforelse
                </div>

            </div>
        </div>
    </section>
</x-priki.layout>
