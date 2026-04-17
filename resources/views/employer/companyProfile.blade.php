<x-app-layout>
    <div class="min-h-screen bg-gray-100 pb-12">
        
        {{-- Banner Component --}}
        <x-image-banner-uploader 
            :action="route('employer.updateBanner')" 
            :currentImage="$company->banner_path" 
            name="banner"
        />

        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 relative z-30">
            <div class="-mt-12 sm:-mt-16 flex flex-col sm:flex-row sm:items-end sm:space-x-5">
                
                {{-- Logo Component (Replaced the static img) --}}
                <div class="flex">
                    <x-image-logo-uploader 
                        :action="route('employer.updateLogo')" 
                        :currentImage="$company->logo_path" 
                        :companyName="$company->name ?? 'C'"
                        name="logo"
                    />
                </div>
                
                <div class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                    <div class="mt-6 min-w-0 flex-1">
                        <h1 class="truncate text-2xl font-bold text-gray-900">
                            {{ $company->name ?? 'Company Name Inc.' }}
                        </h1>
                        <p class="text-gray-500 font-medium">{{ $company->tagline ?? 'Tagline' }}</p>
                    </div>
                    <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
                        <a href="{{ route('employer.edit') }}" class="inline-flex justify-center items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <main class="mx-auto mt-8 max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="space-y-6 lg:col-span-1">
                    <section class="rounded-lg bg-white p-6 shadow-sm border border-gray-100 h-fit">
                        <h2 class="text-lg font-bold text-gray-900 border-b pb-2">About Company</h2>
                        
                        <div class="mt-4 h-auto">
                            <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line break-words">
                                {{ $company->description ?? 'No description provided yet.' }}
                            </p>
                        </div>
                        
                        <div class="mt-6 space-y-4 pt-4 border-t border-gray-100">
                            <div class="flex items-center text-sm">
                                <span class="font-semibold text-gray-400 w-24">Location:</span>
                                <span class="text-gray-700">{{ $company->location ?? 'Not specified' }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="font-semibold text-gray-400 w-24">Employees:</span>
                                <span class="text-gray-700">{{ $company->size ?? '1 - 10' }}</span>
                            </div>
                        </div>
                    </section>
                </div>

                <x-company-gallery 
                    :photos="$company->photos" 
                    :uploadRoute="route('employer.company.photos.uploadPhotos', $company)" 
                />

            </div>
        </main>
    </div>
</x-app-layout>