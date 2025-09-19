<x-layout-app title="Update Horarios">
    <div class="container-fluid text-bg-light h-100">
        <h3 class="text-primary">Editar Horarios</h3>
        <hr>
        <x-profile-client/>
        <hr>
        <div class="d-flex flex-wrap gap-4 justify-content-center align-items-center h-50">
            <div class="card p-4 col-lg-3">

                <form action="{{ route('client.update.horario') }}" method="post">
                    @csrf

                    <input type="hidden" name="auth_id" value="{{ $horario->id }}">

                    <div class="form-floating mb-3">
                        <input type="time" step="2" name="times" class="form-control @error('times') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ $horario->times }}" aria-describedby="validationInput" style="font-size: 1.5rem;" autofocus>
                        <label for="floatingInput">Horario: </label>
                        <div id="validationInput" class="form-text text-danger">
                            @error('times')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="active" role="switch" id="switchCheckDefault" @if($horario->active) checked @endif>
                        <label class="form-check-label ms-3 @if($horario->active) text-danger @else text-success @endif" for="switchCheckDefault">{{ $horario->active ? 'Indisponível' : 'Disponivel' }}</label>
                        <div id="validationInput" class="form-text">
                            @if(!$horario->active)
                                <b class="text-danger">atençao:</b> se essa opçao estiver ativada sera indisponível o horario
                            @endif
                        </div>
                    </div>


                    <div class="my-3 d-flex justify-content-between flex-wrap">
                        <button type="submit" class="btn btn-sm btn-primary">Salvar <i class="fas fa-plus ms-2 text-bg-light text-dark p-1 rounded"></i></button>
                        <a href="{{ route('client.create.horario') }}" class="btn btn-sm btn-outline-dark">Voltar!</a>
                    </div>
                </form>
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        <span class="text-center">{{ session('error') }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout-app>
