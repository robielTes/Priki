@extends('layout.app')

@section('content')
    <h1 class="text-center text-5xl py-3 font-bold">PRIKI</h1>

       <div class="text-center text-xl pb-6">
           <label for="nbDays"></label>
            Nouveau de <input type="number" name="nbDays" id="nbDays" min="1" max="31" value="{{$nbDays ? $nbDays :5}}"> jours
       </div>

    <div class="px-10 grid grid-cols-3 gap-2">
            @forelse($practices as $practice)
                @if($practice->publicationState->slug !== 'PUB')
                    @continue
                @endif
                <div class="pb-10">
                    <h3 class="text-center text-xl font-semibold">{{$practice->domain->name}}</h3>
                    <p>{{$practice->description}}</p>
                    <p class="text-xs italic">{{ $practice->updated_at->translatedFormat('l jS F Y')}}</p>
                </div>
            @empty
                <h3 class="text-center">Aucune pratique à afficher ici</h3>
            @endforelse
    </div>
@endsection
