<x-layout title="Edit Book | {{ $book->title }}">
    <div class="max-w-4xl mx-auto px-6 py-10 mt-12">
        
        <div class="mb-10">
            <a href="{{ route('books.index') }}" class="text-blue-400 hover:text-blue-300 text-sm font-bold uppercase tracking-widest mb-2 inline-block">
                ← Cancel and Go Back
            </a>
            <h1 class="text-4xl font-black text-white tracking-tight">
                Update <span class="text-amber-400">Book Details</span>
            </h1>
        </div>

        <form action="{{ route('books.update', $book->id) }}" method="POST" 
              class="p-8 rounded-3xl bg-gradient-to-b from-white/10 to-white/[0.02] border border-white/10 shadow-2xl">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">Book Title</label>
                    <input type="text" name="title" value="{{ $book->title }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Author -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">Author</label>
                    <input type="text" name="author" value="{{ $book->author }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Genre -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">Genre</label>
                    <input type="text" name="genre" value="{{ $book->genre }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">Description</label>
                    <textarea name="description" rows="4" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">{{ $book->description }}</textarea>
                </div>

                <!-- Published Year (NEW) -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">Published Year</label>
                    <input type="number" name="published_year" value="{{ $book->published_year }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Pages (NEW) -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">Number of Pages</label>
                    <input type="number" name="pages" value="{{ $book->pages }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Language (NEW) -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">Language</label>
                    <select name="language" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                        <option value="English" {{ $book->language == 'English' ? 'selected' : '' }} class="text-black" style="color: black !important;">English</option>
                        <option value="Tagalog" {{ $book->language == 'Tagalog' ? 'selected' : '' }} class="text-black" style="color: black !important;">Tagalog</option>
                        <option value="Spanish" {{ $book->language == 'Spanish' ? 'selected' : '' }} class="text-black" style="color: black !important;">Spanish</option>
                    </select>
                </div>

                <!-- Publisher (NEW) -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">Publisher</label>
                    <input type="text" name="publisher" value="{{ $book->publisher }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Price & ISBN -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">Price ($)</label>
                    <input type="number" step="0.01" name="price" value="{{ $book->price }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2">ISBN</label>
                    <input type="text" name="isbn" value="{{ $book->isbn }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Availability Checkbox -->
                <div class="md:col-span-2 flex items-center gap-3 p-4 rounded-xl bg-white/5 border border-white/10">
                    <input type="checkbox" name="is_available" id="is_available" value="1" {{ $book->is_available ? 'checked' : '' }} 
                           class="w-5 h-5 accent-amber-400 bg-transparent border-white/20 rounded">
                    <label for="is_available" class="text-amber-300 text-xs font-bold uppercase cursor-pointer">
                        This book is currently available in stock
                    </label>
                </div>
            </div>

            <div class="mt-10">
                <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-amber-950 font-black py-4 rounded-2xl transition-all transform hover:scale-[1.02] shadow-xl shadow-amber-400/10 uppercase tracking-widest">
                    Update Record
                </button>
            </div>
        </form>
    </div>
</x-layout>
