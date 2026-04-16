<x-layout title="Book Management | IT9a/L">
    <div class="max-w-7xl mx-auto px-6 mt-16 mb-10">

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-10">
                <div class="bg-emerald-500/20 border border-emerald-500/50 text-emerald-400 px-4 py-3 rounded-xl font-bold">
                    {{ session('success') }}
                </div>
            </div>
        @endif
  
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mt-12 mb-10">
            <h1 class="text-4xl font-black text-white tracking-tight mb-4 md:mb-0">
                📚 Book <span class="text-amber-400">Inventory</span>
            </h1>
            <a href="{{ route('books.create') }}" class="px-4 py-2 border border-gray-300 text-white hover:bg-white/10 transition-all rounded-xl font-bold">
                + Add Book
            </a>
        </div>

        <!-- Search & Filter Bar -->
        <form action="{{ route('books.index') }}" method="GET" class="mb-8 flex flex-col md:flex-row gap-4 p-6 rounded-3xl bg-white/10 border border-white/20 backdrop-blur-md shadow-xl">
    
            <!-- Search Input (Fixed to take up most space) -->
            <div class="flex-[3]"> 
                <label class="block text-amber-300 text-[10px] font-bold uppercase mb-1 tracking-widest px-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" 
                placeholder="Search by title or author..." 
                class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-blue-100/30 focus:outline-none focus:border-amber-400 focus:bg-white/20 transition-all">
            </div>
    
            <!-- Genre Dropdown -->
            <div class="flex-1 min-w-[200px]">
                <label class="block text-amber-300 text-[10px] font-bold uppercase mb-1 tracking-widest px-1">Filter by Genre</label>
                <select name="genre" class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-amber-400">
                    <!-- Force black color on the 'All Genres' option -->
                    <option value="" class="text-black" style="color: black !important;">All Genres</option>
        
                    @foreach($genres as $genre)
                    <!-- Force black color on every dynamic genre option -->
                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }} 
                            class="text-black" style="color: black !important;">
                        {{ $genre }}
                    </option>
                @endforeach
                </select>
            </div>

            <!-- Filter Button -->
            <div class="flex items-end">
                <button type="submit" class="w-full md:w-auto bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg shadow-blue-500/20 active:scale-95">
                    Filter Results
                </button>
            </div>
        </form>

        <!-- Books Table -->
        <div class="rounded-3xl bg-gradient-to-b from-white/10 to-white/[0.02] border border-white/10 overflow-hidden shadow-2xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/10 bg-white/5">
                        <th class="px-6 py-4 text-amber-300 font-bold uppercase text-xs tracking-widest">Cover</th>
                        <th class="px-6 py-4 text-amber-300 font-bold uppercase text-xs tracking-widest">Title</th>
                        <th class="px-6 py-4 text-amber-300 font-bold uppercase text-xs tracking-widest">Author</th>
                        <th class="px-6 py-4 text-amber-300 font-bold uppercase text-xs tracking-widest">Genre</th>
                        <th class="px-6 py-4 text-amber-300 font-bold uppercase text-xs tracking-widest">Price</th>
                        <th class="px-6 py-4 text-amber-300 font-bold uppercase text-xs tracking-widest">Status</th>
                        <th class="px-6 py-4 text-amber-300 font-bold uppercase text-xs tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-blue-100/80">
                    @forelse($books as $book)
                    <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors">
                        <td class="px-6 py-4">
                            <div class="w-12 h-16 rounded-lg bg-white/5 border border-white/10 overflow-hidden flex items-center justify-center">
                                @if($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-full h-full object-cover">
                                @else
                                <svg xmlns="http://w3.org" class="h-6 w-6 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                @endif
                            </div>
                        </td>

                        <td class="px-6 py-4 font-semibold text-white hover:text-amber-400">
                            <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
                        </td>
                        <td class="px-6 py-4">{{ $book->author }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-400/10 text-blue-300 px-2 py-1 rounded-md text-sm border border-blue-400/20">
                                {{ $book->genre }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-emerald-400 font-mono">${{ number_format($book->price, 2) }}</td>
                        <td class="px-6 py-4">
                            @if($book->is_available)
                                <span class="text-emerald-400 text-xs font-bold uppercase">● Available</span>
                            @else
                                <span class="text-rose-400 text-xs font-bold uppercase">○ Out of Stock</span>
                            @endif
                        </td>
                        <!-- Number 2/3 Content: Actions -->
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-4">
                                <a href="{{ route('books.edit', $book->id) }}" class="text-amber-400 hover:text-amber-300 font-bold text-xs uppercase tracking-widest transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Delete this book?')" class="flex items-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-500 hover:text-rose-400 font-bold text-xs uppercase tracking-widest transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-blue-200/50 italic">
                            No books found matching your criteria.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
