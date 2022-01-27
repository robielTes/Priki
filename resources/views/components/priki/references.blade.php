<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4">
            @forelse($references as $reference)
                <div class="p-4 lg:w-1/3">
                    <div
                        class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">{{$reference->description}}</h1>
                        @if($reference->url !== '')
                            <a class="text-indigo-500 inline-flex items-center"
                               href="{{$reference->url}}">Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

            @empty
                <h3 class="text-center">Aucune pratique à afficher ici</h3>
            @endforelse

        </div>
    </div>
</section>
