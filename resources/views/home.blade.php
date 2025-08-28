<x-layout-app title="Home">
    <div class="text-center">
        @if(session('success'))
            <div class="alert text-bg-success alert-dismissible text-center fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1>Home</h1>
    </div>
</x-layout-app>
