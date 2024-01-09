@if(session('success'))
<div class='my-5 w-fit bg-green-100 border border-green-200 text-green-700 p-2 rounded-md'>
    {{ $slot }}</div>

@endif