<div class="relative" x-data="{
    open: false,
    toggle() {
        if (this.open) {
            return this.close()
        }
        this.$refs.button.focus()
        this.open = true
    },
    close(focusAfter) {
        if (!this.open) return
        this.open = false
        focusAfter && focusAfter.focus()
    }
}" x-on:keydown.escape.prevent.stop="close($refs.button)"
    x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['profile-dropdown-button']">
    <button x-ref="button" x-on:click="toggle()" x-tra type="button" :class="open && 'ring-ascent ring-4'"
        class="h-[40px] w-[40px] overflow-clip rounded-lg border border-gray-200 mt-1">
        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="profile">
    </button>
    <div x-ref="panel" x-show="open" x-transition.origin.top.right x-on:click.outside="close($refs.button)"
        :id="$id('profile-dropdown-button')" style="display: none;"
        class="absolute -right-2 z-10 mt-3 md:w-auto sm:w-fit origin-top-right rounded-xl bg-white shadow-lg overflow-clip p-5 space-y-5 text-left border">

        <button class="flex items-center justify-start w-auto space-x-3">
            <div class="w-[50px] h-[50px] rounded-full border overflow-hidden">
                <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="profile"
                    class="h-full w-full" />
            </div>
            <div class="whitespace-nowrap text-left">
                <h1 class="font-semibold text-base mb-[1px]">{{ auth()->user()->name }}</h1>
                <h1 class="text-slate-700 text-[0.65rem]">{{ auth()->user()->email }}</h1>
            </div>
        </button>

        <hr />

        <ul class="flex flex-col space-y-3">
            <li>
                <a href=""
                    class="text-xs font-medium text-slate-800 hover:text-admin-ascent-dark whitespace-nowrap flex items-center justify-start">
                    <i data-feather="settings" class="mr-2 h-5 w-5"></i> Account Settings
                </a>
            </li>
            <li>
                <a onclick="handleLogout()"
                    class="text-xs font-medium text-slate-800 hover:text-admin-ascent-dark whitespace-nowrap flex items-center justify-start cursor-pointer">
                    <i data-feather="log-out" class="mr-2 h-5 w-5"></i> Logout
                </a>
                <script>
                    function handleLogout() {
                        swal({
                                title: "Are you sure?",
                                text: "Once you clicked you will logged out!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $('#logout-form').submit();
                                }
                            });
                    }
                </script>
            </li>
        </ul>

    </div>
</div>
