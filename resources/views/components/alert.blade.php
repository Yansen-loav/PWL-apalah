@props(['type' => 'SUCCESS'])
 
@if ($type === 'ERROR')
    <div class="border border-red-500 bg red-100 rounded-lg p-4">
        <h1 class="text-lg text-red-500 font-bold">ERROR</h1>
        <p class="text-red-500">{{ $slot }}</p>
    </div>
@elseif($type === 'WARNING')
    <div class="border border-yellow-500 bg red-100 rounded-lg p-4">
        <h1 class="text-lg text-yellow-500 font-bold">WARNING</h1>
        <p class="text-yellow-500">{{ $slot }}</p>
    </div>
@elseif($type === 'SUCCESS')
    <div class="border border-green-500 bg red-100 rounded-lg p-4">
        <h1 class="text-lg text-green-500 font-bold">SUCCESS</h1>
        <p class="text-green-500">{{ $slot }}</p>
    </div>
@else
    <div class="border border-blue-500 bg red-100 rounded-lg p-4">
        <h1 class="text-lg text-blue-500 font-bold">INFO</h1>
        <p class="text-blue-500">{{ $slot }}</p>
    </div>
@endif