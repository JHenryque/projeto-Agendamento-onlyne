<aside class="d-flex flex-column col-md-2 text-center text-bg-dark">
    <div class="mt-5">
        <a href="{{ route('home') }}"><i class="fas fa-home me-3"></i>Home</a>

        <div class="text-center mt-2">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-sign-out-alt me-3"></i> Logout
                </button>
            </form>
        </div>
    </div>
</aside>

