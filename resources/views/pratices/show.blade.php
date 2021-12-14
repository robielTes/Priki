@extends('layouts.app')

@section('content')
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
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="-my-8 divide-y-2 divide-gray-100">
                @forelse($practice->opinion as $opinion)
                <div class="py-8 flex flex-wrap md:flex-nowrap">
                    <div class="md:flex-grow">
                        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{$opinion->user->fullname}}
                            <span class="text-xs font-medium italic text-gray-400 mb-1">{{ $practice->created_at->translatedFormat('jS F Y')}}</span>
                        </h2>
                        <p class="leading-relaxed">{{$opinion->description}}</p>
                    </div>
                </div>

                @empty
                    <h3 class="text-center">Aucune opinion à afficher ici</h3>
                @endforelse

            </div>
        </div>
    </section>
@endsection
