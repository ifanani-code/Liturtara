@if (session()->has('success'))
    <div class="flex w-full justify-center p-5 bg-opacity-50 bg-green-500 text-xl font-medium text-green-700">
        {{ session()->get('success') }}
    </div>
@elseif (session()->has('error'))
    <div class="flex w-full justify-center p-5 bg-opacity-50 bg-red-500 text-xl font-medium text-red-700">
        {{ session()->get('error') }}
    </div>
@elseif (session()->has('status'))
    <div class="flex w-full justify-center p-5 bg-opacity-50 bg-navy text-xl font-medium text-navy">
        {{ session()->get('status') }}
    </div>
@endif
