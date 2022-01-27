<x-priki.layout>
    <h1 class="text-center text-5xl py-3 font-bold">PRIKI</h1>
    <div class="text-center text-xl pb-6">
        <label for="nbDays"></label>
        Nouveau de <input type="number" name="nbDays" id="nbDays" min="1" max="31" class="input"
                          value="{{$nbDays ? $nbDays :5}}"> jours
    </div>
    <x-priki.practices :practices=$practices />
</x-priki.layout>
