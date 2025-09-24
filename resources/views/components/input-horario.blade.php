<div class="mb-3">
    <label>Horário:</label>
    <div class="d-flex flex-wrap mt-2">

        @foreach($horarios as $horario)
            <div class="card p-2 mb-2 me-2">
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="horario" id="horario{{ $horario->id }}" value="{{ $horario->times }}">
                        <label class="form-check-label" for="horario{{ $horario->id }}">
                            <b>{{ $horario->times }}</b>
                        </label>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div id="validationInput" class="form-text text-danger">
        @error('horario')
        {{ $message }}
        @enderror
    </div>
</div>
