<x-layout-app title="Altera a senha">
    <div class="container-fluid d-flex justify-content-center h-100" >
                <div class="d-flex justify-content-center col-md-12" style="min-height: 800px;">
                    <div class="card col-md-6 align-self-center p-4 mt-4">
                        <h2 class="text-primary mb-5">Alterar a Senha</h2>
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
