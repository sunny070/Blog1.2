<div class="grid grid-cols-4 gap-8 ">
    {{-- Main Content --}}
    <div class="col-span-3 space-y-3">
        @foreach ($posts as $post)
        <div class="bg-indigo ">
            <x-blog.post :post="$post"/>
        </div>
        @endforeach
    </div>
    {{-- Side Navigation --}}
    <div class="space-y-8">
        {{-- Sorting --}}
        <div class="flex item-center">
            <h2 class="mr-4">Sort:</h2>
            <div class="space-x-4">
                <button wire:click="sortBy('recentAsc')" class="{{ $selectedSortBy === 'recentAsc' ? 'bg-indigo-500 text-white' : '' }} p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
                    </svg>

                </button >
               

                <button wire:click="sortBy('recentDesc') " class="{{ $selectedSortBy === 'recentDesc' ? 'bg-indigo-500 text-white' : '' }} p-1" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0l-3.75-3.75M17.25 21L21 17.25" />
                </svg>
                </button>
            </div>
        </div>
        
        {{-- Category --}}
        <div>
            <div class="p-2 text-white bg-indigo-500 mb-2">
                <h2>Categories</h2>
            </div>
           <div class="flex flex-col items-start">
            @foreach ($categories as $category )
            <button wire:click="toggleCategory('{{ $category->id }}')" class="{{ $selectedCategory == $category->id ? 'bg-indigo-500 text-white focus:outline-none': ''}} p-2 w-44">
                    {{ $category->name }}
            </button>
        @endforeach
           </div>
        </div>
    </div>
</div>