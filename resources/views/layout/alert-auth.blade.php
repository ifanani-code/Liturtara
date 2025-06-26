@if (session()->has('success'))
    <div class="py-4 text-base font-medium text-green-500">
        {{ session()->get('success') }}
    </div>
@elseif (session()->has('error'))
    <div class="py-4 text-base font-medium text-red-500">
        {{ session()->get('error') }}
    </div>
@elseif (session()->has('status'))
    <div class="py-4 text-base font-medium text-navy">
        {{ session()->get('status') }}
    </div>
@endif
