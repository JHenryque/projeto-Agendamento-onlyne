<x-layout-app title="Editar Perfil">
    <div class="bg-light p-2">
        <h3>Edite Perfil</h3>
        <hr>
        <x-profile-user/>
        <hr>
        <div class="container-fluid mt-5">
            <div class="d-flex justify-content-center p-5">
                <form class="form-floating col-md-8">
                    <div class="form-floating mb-3">
                        <input type="text" readonly class="form-control-plaintext" id="floatingInput" value="{{ auth()->user()->name }}" placeholder="name@example.com">
                        <label for="floatingInput">Nome:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" readonly class="form-control-plaintext" id="floatingInput" placeholder="name@example.com" value="{{ auth()->user()->email }}">
                        <label for="floatingInput">Email: </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-app>
