@props([
    'action',
    'currentImage' => null,
    'name' => 'banner'
])

<div class="relative">
    <div x-data="{ 
        editing: false, 
        preview: '{{ $currentImage ? asset('storage/' . $currentImage) : '' }}' 
    }" class="relative w-full">
        
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div @click="editing = true" class="relative h-48 w-full bg-gray-200 overflow-hidden cursor-pointer group">
                
                <img :src="preview" 
                    x-show="preview" 
                    class="h-full w-full object-cover" 
                    alt="Banner Preview">

                <div x-show="editing" x-cloak class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center space-y-3 z-20">
                    <label class="cursor-pointer bg-white px-4 py-2 rounded-md font-semibold text-sm shadow-md">
                        <span>Select New Image</span>
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
                    <div class="flex space-x-2">
                        <button type="submit" class="bg-green-600 text-white px-3 py-1.5 rounded font-bold">Save</button>
                        <button type="button" @click.stop="editing = false" class="bg-gray-500 text-white px-3 py-1.5 rounded font-bold">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>