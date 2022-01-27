@if ($message = Session::get('error'))
    <div class="font-medium text-sm text-red-600 bg-red-200 p-4">
        <strong>{{ $message }}</strong>
    </div>
@endif
