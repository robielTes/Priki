<div class="text-center text-xl pb-6">
    <select name="listDomains" class="input" id="listDomains">
        <option selected value="TOU">Tous {{count($practices)}} </option>
        @foreach($domains as $domain)
            <option value="{{$domain->first()->domain->slug}}">
                {{$domain->first()->domain->name . ' ' . count($domain)}}
            </option>
        @endforeach

    </select>
</div>
