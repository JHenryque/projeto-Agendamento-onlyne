<x-layout-app title="Altera a senha">
    <div class="container-fluid h-100 text-bg-light">
            <x-profile-user/>
            <hr>
            <div class="container col-md-6">
                <h1 class="text-dark-emphasis my-5"><i class="fa-solid fa-lock-open text-warning me-3"></i> Alterar a Senha</h1>

                <div class="card w-100 p-4">
                <!-- login form -->
                            <form class="p-2" action="{{ route('user.profile.password.update.confirm') }}" method="post">
                                @csrf


                                <div class="mb-3">
                                    <label for="password">Nova Senha: </label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation">Confirma a Senha: </label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn btn-primary px-4">Confirme</button>
                                </div>
                            </form>

                </div>
            </div>

    </div>
</x-layout-app>
