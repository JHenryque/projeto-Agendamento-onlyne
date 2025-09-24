<x-layout-app title="Crear Horarios">
    <div class="container-fluid text-bg-light h-100">
        <h3 class="text-primary">Criar Horarios</h3>
        <hr>
        <x-profile-client/>
        <hr>
        @if(session('success'))
            <div class="alert bg-success alert-dismissible text-center fade show" role="alert">
                <strong class="text-center">{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex flex-wrap gap-4 justify-content-center align-items-center h-50">

                <div class="card p-4 col-lg-3">

                    <form action="{{ route('client.submit.horario') }}" method="post">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="time" step="2" name="times" class="form-control @error('times') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('times', date('00:00:00')) }}" aria-describedby="validationInput" style="font-size: 1.5rem;" autofocus>
                            <label for="floatingInput">Horario: </label>
                            <div id="validationInput" class="form-text text-danger">
                                @error('times')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-primary">Salvar <i class="fas fa-plus ms-2 text-bg-light text-dark p-1 rounded"></i></button>
                        </div>
                    </form>
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            <span class="text-center">{{ session('error') }}</span>
                        </div>
                    @endif
                </div>

                @if($horarios->count() === 0)
                    <div class="text-center"></div>
                @else
                    <div class="col-lg-5 text-bg-secondary p-4 rounded">
                        <x-table-horario :horarios="$horarios" />
                    </div>
                @endif

        </div>
    </div>
</x-layout-app>
