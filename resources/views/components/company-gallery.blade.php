@props([
    'title' => 'Company Gallery',
    'photos' => [],
    'maxEmptySlots' => 3,
    'uploadRoute' => '#' {{-- Pass your route here --}}
])

<div {{ $attributes->merge(['class' => 'lg:col-span-2']) }}>
    <section class="rounded-lg bg-white p-6 shadow-sm border border-gray-100">
        
        {{-- Wrap everything in an Alpine.js component for easy interaction --}}
        <div x-data="{ 
            triggerUpload() { this.$refs.fileInput.click() },
            submitForm() { this.$refs.uploadForm.submit() }
        }">
            
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-900">{{ $title }}</h2>
                
                {{-- Hidden Form --}}
                <form 
                    x-ref="uploadForm" 
                    action="{{ $uploadRoute }}" 
                    method="POST" 
                    enctype="multipart/form-data" 
                    class="hidden"
                >
                    @csrf
                    <input 
                        type="file" 
                        name="photos[]" 
                        x-ref="fileInput" 
                        multiple 
                        accept="image/*" 
                        @change="submitForm()" {{-- Automatically upload once selected --}}
                    >
                </form>

                <button 
                    type="button"
                    @click="triggerUpload()"
                    class="text-sm font-medium text-blue-600 hover:text-blue-500"
                >
                    + Add Photo
                </button>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                @forelse ($photos as $photo)
                    <div class="group relative aspect-square overflow-hidden rounded-lg bg-gray-100">
                        <img 
                            src="{{ asset('storage/' . $photo->path) }}" 
                            loading="lazy" 
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                        >
                    </div>
                @empty
                    @for ($i = 1; $i <= $maxEmptySlots; $i++)
                        <div class="aspect-square rounded-lg bg-gray-50 border-2 border-dashed border-gray-200 flex items-center justify-center text-gray-400 text-xs">
                            Empty Slot
                        </div>
                    @endfor
                @endforelse
            </div>
        </div>
    </section>
</div>