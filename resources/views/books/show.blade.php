<x-layout title="{{ $book->title }} | Details">
    <div class="max-w-6xl mx-auto px-6 py-10">
        
        <a href="{{ route('books.index') }}" class="text-blue-400 hover:text-blue-300 text-sm font-bold uppercase tracking-widest mb-6 inline-block">
            ← Back to Inventory
        </a>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Left: Cover Image -->
            <div class="md:col-span-1">
                <div class="rounded-3xl overflow-hidden border border-white/10 shadow-2xl bg-white/5 aspect-[3/4] flex items-center justify-center">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" class="w-full h-full object-cover">
                    @else
                        <div class="text-blue-200/30 flex flex-col items-center">
                            <svg xmlns="http://w3.org" class="h-20 w-20 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="font-bold uppercase tracking-widest text-xs">No Cover Available</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Book Details -->
            <div class="md:col-span-2 space-y-8">
                <div>
                    <span class="bg-amber-400/10 text-amber-400 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest border border-amber-400/20 mb-4 inline-block">
                        {{ $book->genre }}
                    </span>
                    <h1 class="text-5xl font-black text-white leading-tight">{{ $book->title }}</h1>
                    <p class="text-2xl text-blue-200 mt-2">by <span class="text-amber-300">{{ $book->author }}</span></p>
                </div>

                <div class="p-8 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <h3 class="text-amber-300 font-bold uppercase text-sm mb-4 tracking-widest">Description</h3>
                    <p class="text-blue-100/70 leading-relaxed text-lg">
                        {{ $book->description }}
                    </p>
                </div>

                <!-- Technical Specs Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/5">
                        <p class="text-blue-300/50 text-[10px] font-bold uppercase mb-1">ISBN</p>
                        <p class="text-white font-mono">{{ $book->isbn }}</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/5">
                        <p class="text-blue-300/50 text-[10px] font-bold uppercase mb-1">Pages</p>
                        <p class="text-white font-bold">{{ $book->pages }}</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/5">
                        <p class="text-blue-300/50 text-[10px] font-bold uppercase mb-1">Year</p>
                        <p class="text-white font-bold">{{ $book->published_year }}</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/5">
                        <p class="text-blue-300/50 text-[10px] font-bold uppercase mb-1">Price</p>
                        <p class="text-emerald-400 font-bold">${{ number_format($book->price, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
