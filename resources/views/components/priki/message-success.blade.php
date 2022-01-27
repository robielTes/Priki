@if ($message = Session::get('success'))
    <div class="font-medium text-sm text-green-600 bg-green-200 p-4">
        <strong class="text-center">{{ $message }}</strong>
    </div>
@endif
