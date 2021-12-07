@extends('layouts.app')

@section('content')

    <h1 class="text-center text-5xl py-3 font-bold">PRIKI</h1>
    <div class="text-center text-xl pb-6">
        <label for="nbDays"></label>
        Nouveau de <input type="number" name="nbDays" id="nbDays" min="1" max="31" class="input" placeholder="X"> jours
    </div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @forelse($practices as $practice)
                    <div class="p-4 lg:w-1/3">
                        <div
                            class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                            <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">{{$practice->domain->name}}</h1>
                            <h2 class="text-xs font-medium italic text-gray-400 mb-1">{{ $practice->updated_at->translatedFormat('jS F Y')}}</h2>
                            <p class="mb-3 prikiDescription">{{$practice->description}}</p>
                            <a class="text-indigo-500 inline-flex items-center"
                               href="{{ route('practices.show', ['id' => $practice->id] ) }}">Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                @empty
                    <h3 class="text-center">Aucune pratique à afficher ici</h3>
                @endforelse

            </div>
        </div>
    </section>

@endsection




