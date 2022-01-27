<div class="text-center text-xl pb-6">
    <select name="listDomains" class="input" id="listDomains">

        <option {{'TOU' == session()->get('domain')? 'selected': '' }} value="TOU">
            Tous {{$domains->collapse()->count()}} </option>
        @foreach($domains as $domain)
            <option {{$domain[0]->domain->slug == session()->get('domain') ? 'selected': '' }}
                    value="{{$domain[0]->domain->slug}}">
                {{$domain[0]->domain->name . ' ' . count($domain)}}
            </option>
        @endforeach

    </select>
</div>
