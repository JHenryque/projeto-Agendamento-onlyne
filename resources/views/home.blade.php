<x-layout-app title="Home">
    <div class="text-center">
        <h1>Home</h1>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Sair</button>
        </form>
    </div>
</x-layout-app>
