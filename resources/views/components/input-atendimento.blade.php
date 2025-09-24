<div class="mb-3">
    <label>Tipo de Atendimento:</label>
    <div class="d-flex flex-wrap mt-2 col-md-12" id="validationInput">
        @foreach($atendimentos as $atendimento)
            <div class="card p-2 me-3 mb-3">
                <div class="form-check">
                    <input class="form-check-input me-3" type="radio" name="atendimento" id="radioDefault{{ $atendimento->id }}" value="{{ $atendimento->id }}">
                    <label class="form-check-label" for="radioDefault{{ $atendimento->id }}">
                        <b>{{ $atendimento->name }}</b> <br> R${{ $atendimento->preco }} reais
                        @if($atendimento->observacao)
                            | {{ $atendimento->observacao }}
                        @endif
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <div id="atendimento" class="form-text text-danger" id="validationInput">
        @error('data')
        {{ $message }}
        @enderror
    </div>
</div>
