@props([
    'action',
    'currentImage' => null,
    'name' => 'logo',
    'companyName' => 'C'
])

<div x-data="{ 
    editing: false, 
    preview: '{{ $currentImage ? asset('storage/' . $currentImage) : 'https://ui-avatars.com/api/?name=' . urlencode($companyName) . '&color=7F9CF5&background=EBF4FF' }}' 
}" class="relative">
    
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        {{-- Logo Container --}}
        <div @click="editing = true" class="relative h-24 w-24 sm:h-32 sm:w-32 rounded-full ring-4 ring-white bg-white overflow-hidden cursor-pointer group shadow-sm">
            
            {{-- Current/Preview Image --}}
            <img :src="preview" 
                 class="h-full w-full object-cover" 
                 alt="Company Logo">

            {{-- Hover/Edit Overlay --}}
            <div x-show="editing" x-cloak class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center z-20">
                <label class="cursor-pointer p-2 rounded-full bg-white/20 hover:bg-white/40 transition">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <input type="file" name="{{ $name }}" class="hidden" accept="image/*" 
                        @change="
                            const file = $event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = (e) => { preview = e.target.result; };
                                reader.readAsDataURL(file);
                            }
                        ">
                </label>
                
                <div class="flex flex-col space-y-1 mt-2">
                    <button type="submit" class="text-[10px] bg-green-600 text-white px-2 py-0.5 rounded font-bold uppercase">Save</button>
                    <button type="button" @click.stop="editing = false" class="text-[10px] bg-gray-500 text-white px-2 py-0.5 rounded font-bold uppercase">Exit</button>
                </div>
            </div>
        </div>
    </form>
</div>