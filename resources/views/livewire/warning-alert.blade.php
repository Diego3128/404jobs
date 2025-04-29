<div class="text-sm md:text-[16px] text-gray-800  mt-2 border-l-8 pl-2 border-l-yellow-500 bg-yellow-200 py-1.5">
    @foreach ((array) $messages as $message)
        <p>{{ $message }}</p>
    @endforeach
</div>
