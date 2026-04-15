<x-layout title="Add New Book | IT9a/L">
    <div class="max-w-4xl mx-auto px-6 py-10">
        
        <!-- Header -->
        <div class="mb-10 mt-4">
            <a href="{{ route('books.index') }}" class="text-blue-400 hover:text-blue-300 text-sm font-bold uppercase tracking-widest mb-2 inline-block">
                ← Back to Inventory
            </a>
            <h1 class="text-4xl font-black text-white tracking-tight">
                Register New <span class="text-amber-400">Book</span>
            </h1>
        </div>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-xl mb-4">
                <p class="font-bold mb-2">Please fix the following errors:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Card -->
        <form action="{{ route('books.store') }}" method="POST" 
              class="p-8 rounded-3xl bg-gradient-to-b from-white/10 to-white/[0.02] border border-white/10 shadow-2xl">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">Book Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all" placeholder="e.g. The Great Gatsby">
                </div>

                <!-- Author -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">Author</label>
                    <input type="text" name="author" value="{{ old('author') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Genre Dropdown -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">Genre</label>
                    <select name="genre" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                        <option value="" class="text-gray-500">Select Genre</option>
                        <option value="Fiction" class="text-black" style="color: black !important;">Fiction</option>
                        <option value="Non-Fiction" class="text-black" style="color: black !important;">Non-Fiction</option>
                        <option value="Science" class="text-black" style="color: black !important;">Science</option>
                        <option value="History" class="text-black" style="color: black !important;">History</option>
                        <option value="Fantasy" class="text-black" style="color: black !important;">Fantasy</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">Description</label>
                    <textarea name="description" rows="4" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">{{ old('description') }}</textarea>
                </div>

                <!-- Published Year (NEW) -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">Published Year</label>
                    <input type="number" name="published_year" value="{{ old('published_year') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Pages (NEW) -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">Number of Pages</label>
                    <input type="number" name="pages" value="{{ old('pages') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Language (NEW) -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">Language</label>
                    <select name="language" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                        <option value="English" class="text-black" style="color: black !important;">English</option>
                        <option value="Tagalog" class="text-black" style="color: black !important;">Tagalog</option>
                        <option value="Spanish" class="text-black" style="color: black !important;">Spanish</option>
                    </select>
                </div>

                <!-- Publisher (NEW) -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">Publisher</label>
                    <input type="text" name="publisher" value="{{ old('publisher') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <!-- Price & ISBN -->
                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">Price ($)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <div>
                    <label class="block text-amber-300 text-xs font-bold uppercase mb-2 tracking-widest">ISBN</label>
                    <input type="text" name="isbn" value="{{ old('isbn') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-amber-400 focus:outline-none transition-all">
                </div>

                <div class="md:col-span-2 flex items-center gap-3 p-4 rounded-xl bg-white/5 border border-white/10">
                    <input type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }} class="w-5 h-5 accent-amber-400 bg-transparent border-white/20 rounded">
                    <label for="is_available" class="text-amber-300 text-xs font-bold uppercase cursor-pointer"> This book is currently available in stock</label>
                </div>

            </div>

            <!-- Submit Button -->
            <div class="mt-10">
                <button type="submit" class="w-full bg-amber-400 hover:bg-amber-500 text-amber-950 font-black py-4 rounded-2xl transition-all transform hover:scale-[1.02] shadow-xl shadow-amber-400/10 uppercase tracking-widest">
                    SAVE BOOK TO DATABASE
                </button>
            </div>
        </form>
    </div>
</x-layout>
