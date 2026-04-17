<aside class="w-64 bg-slate-800 text-white h-screen fixed top-0 left-0 border-r border-gray-300 shadow-md">
    <div class="p-6 text-xl font-bold border-b border-slate-700">
        JobPortal
    </div>
    
    <nav class="mt-4 space-y-2 px-4">
        {{-- Common Links (Home/Dashboard) --}}
        

        {{-- Role-Based Links --}}
        @if(auth()->user()->role === 'admin')
            <hp class="text-xs text-gray-500 uppercase px-4 mt-6 mb-2">Administration</h>
            <x-sidebar-link href="/admin/users">Manage Users</x-sidebar-link>
            <x-sidebar-link href="/admin/categories">Job Categories</x-sidebar-link>
            <x-sidebar-link href="/admin/reports">Site Analytics</ x-sidebar-link>



        @elseif(auth()->user()->role === 'employer')
            <p class="text-xs text-gray-500 uppercase px-4 mt-6 mb-2">Company Management</p>
            <x-sidebar-link href="{{ route('employer.companyProfile') }}"
                    class="block py-2 px-3 rounded hover:bg-slate-700
                   {{ request()->routeIs('employer.companyProfile') ? 'bg-blue-600 text-white' : '' }}">
                    Company Profile
            </x-sidebar-link>
            <x-sidebar-link href="{{ route('employer.postJob') }}"
                    class="block py-2 px-3 rounded hover:bg-slate-700
                   {{ request()->routeIs('employer.postJob') ? 'bg-blue-600 text-white' : '' }}">
                    Post New Jobs
            </x-sidebar-link>
            <x-sidebar-link href="/jobs/manage">Manage Postings</x-sidebar-link>
            <x-sidebar-link href="/applications/received">Review Applicants</x-sidebar-link>



        @elseif(auth()->user()->role === 'applicant')
            <x-sidebar-link href="{{ route('applicant.dashboard') }}"
                    class="block py-2 px-3 rounded hover:bg-slate-700
                   {{ request()->routeIs('applicant.dashboard') ? 'bg-blue-600 text-white' : '' }}">
                    Dashboard
            </x-sidebar-link>
            <p class="text-xs text-gray-500 uppercase px-4 mt-6 mb-2">Job Seeking</p>
            <x-sidebar-link href="{{ route('applicant.browse-jobs') }}"
                    class="block py-2 px-3 rounded hover:bg-slate-700
                   {{ request()->routeIs('applicant.browse-jobs') ? 'bg-blue-600 text-white' : '' }}">
                    Browse Jobs
            </x-sidebar-link>
            <x-sidebar-link href="/applications/my-history">My Applications</x-sidebar-link>
            <x-sidebar-link href="/profile/resume">My Resume</x-sidebar-link>
        @endif
    </nav>
</aside>