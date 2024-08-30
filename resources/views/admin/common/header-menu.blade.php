<figure class="px-2 py-1 shadow-lg bg-white rounded-xl border">
    <div class="flex items-center justify-between">
        <div>
            <button onclick="toggleSidebar()"
                class="h-[40px] w-[40px] lg:hidden md:hidden hover:bg-complement rounded-lg flex items-center justify-center transition duration-300 ease-in-out hover:ease-in-out border border-gray-200">
                <i data-feather="menu" class="h-4 w-4 stroke-ascent-dark stroke-[3px]"></i>
            </button>
        </div>
        <div class="lg:hidden md:hidden sm:block">
            <h1 class="font-semibold text-base text-ascent">{{config('app.name')}}</h1>
        </div>
        <div class="space-x-2 flex items-center">
            @include('admin.components.profile-dropdown')
        </div>
    </div>
</figure>
