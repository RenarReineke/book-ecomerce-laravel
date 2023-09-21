<!-- Количество книг у автора -->
<div class="flex mt-2">
    <input
        id="fromRange"
        name="fromCount"
        value="{{ $minCountProducts }}"
        min="{{ $minCountProducts }}"
        max="{{ $avgCountProducts - 1 }}"
        class="w-1/2 h-[10px] border-2 border-r-0 border-violet-500 rounded-l-md"
        type="range"
    />
    <input
        id="toRange"
        name="toCount"
        value="{{ $maxCountProducts }}"
        min="{{ $avgCountProducts + 1 }}"
        max="{{ $maxCountProducts }}"
        class="w-1/2 h-[10px] border-2 border-l-0 border-violet-500 rounded-r-md"
        type="range"
    />
</div>
