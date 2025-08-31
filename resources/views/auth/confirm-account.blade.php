<x-layout-guest title="Confirmation password">
    <div class="container mt-5">
        <div class="h-100">
            <div class="d-flex flex-wrap align-content-center justify-content-center w-100" style="min-height: 850px;">

                <!-- login form -->
                <div class="card p-3 col-6 ">
                    <h3 class="text-primary mb-5 mt-2">Confirme o sua senha</h3>


                    <form action="{{ route('confirm-account.submit') }}" method="post">
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

                        <div class="d-flex justify-content-end align-items-center mt-lg-5">
                            <button type="submit" class="btn btn-primary px-4">Confirme</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</x-layout-guest>
