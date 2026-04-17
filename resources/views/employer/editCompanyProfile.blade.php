<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <div class="bg-white p-6 rounded-lg shadow">
                @if(session('success'))
                    <div class="mb-4 text-green-600 font-bold">{{ session('success') }}</div>
                @endif

                <form action="{{ route('employer.update') }}" method="POST">
                    @csrf
                    @method('PATCH') {{-- Use PATCH for updates --}}

                    <div class="mb-4">
                        <label class="block text-gray-700">Company Name</label>
                        <input type="text" name="name" value="{{ $company->name }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Tagline</label>
                        <input type="text" name="tagline" value="{{ $company->tagline }}" class="w-full border-gray-300 rounded-md shadow-sm">
                        @error('tagline') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <textarea name="description" rows="5" class="w-full border-gray-300 rounded-md shadow-sm">{{ $company->description }}</textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>