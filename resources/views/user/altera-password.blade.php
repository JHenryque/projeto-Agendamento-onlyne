<x-layout-app title="Altera a senha">
    <div class="container-fluid d-flex justify-content-center h-100" >
                <div class="card col-md-12" style="min-height: 800px;">
                    <div class="card col-md-6 align-self-center p-4 mt-4">
                    <!-- login form -->
                        <form action="{{ route('altera.password.update') }}" method="post">
                            @csrf

                            <input type="hidden" name="token" value="{{ $user->remember_token }}">

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation">Confirm password</label>
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
