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
@endif
    @guest
        <div class="container px-5 py-24 mx-auto text-center ">
            <a href="{{ route('login') }}">
                <p  class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900 text-2xl">
                    la soumission d’opinions est réservé aux membres
                </p>
            </a>

        </div>
    @endguest
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="-my-8 divide-y-2 divide-gray-100">
                @forelse($practice->opinion as $opinion)
                <div class="py-8 flex flex-wrap md:flex-nowrap">
                    <div class="md:flex-grow">
                        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">
                            <a href="#">{{$opinion->user->fullname}}</a>
                            <span class="text-xs font-medium italic text-gray-400 mb-1">{{ $practice->created_at->translatedFormat('jS F Y')}}</span>
                        </h2>
                        <p class="leading-relaxed">{{$opinion->description}}</p>
                       <div class="inline-grid grid-cols-4 gap-x-3">
                           <div class="flex flex-row">
                               <p>{{$opinion->useOpinion->count()}}</p>
                               <button class="displayComment" name="{{$opinion->id}}">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-red-600 " viewBox="0 0 20 20" fill="currentColor">
                                       <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                                       <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                                   </svg>
                               </button>
                           </div>
                           <div class="flex flex-row">
                               <p>{{$opinion->useOpinion->where('points','=',1)->count()}}</p>
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                   <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                               </svg>
                           </div>
                           <div class="flex flex-row">
                               <p>{{$opinion->useOpinion->where('points','=',-1)->count()}}</p>
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                   <path d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z" />
                               </svg>
                           </div>
                          @auth
                               @if($opinion->user_id === auth()->user()->id)
                                   <form method="POST" action="{{ route('opinion.destroy', ['id' =>$practice->id,'oId' =>$opinion->id] )}} "class="flex flex-row">
                                       <button type="submit">
                                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                           </svg>
                                       </button>
                                       @csrf
                                       @method('delete')
                                   </form>
                               @endif
                          @endauth

                       </div>
                    </div>
                </div>
                <div>
                    <section class="text-gray-600 body-font hidden opinionComment" id="comment{{$opinion->id}}">
                        @forelse($opinion->useOpinion  as $userComment)
                            <div class="container px-5 mx-auto flex flex-wrap">
                                <div class="flex flex-wrap w-full py-2">
                                    <div class="flex relative pb-12">
                                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                        </div>
                                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </div>
                                        <div class="flex-grow pl-4">
                                            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">{{$userComment->user->fullname}}</h2>
                                            <p class="leading-relaxed">{{$userComment->comment}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3 class="text-center">Aucune comment à afficher ici</h3>
                        @endforelse
                    </section>
                </div>
                @empty
                    <h3 class="text-center">Aucune opinion à afficher ici</h3>
                @endforelse

            </div>
        </div>
    </section>
@endsection
