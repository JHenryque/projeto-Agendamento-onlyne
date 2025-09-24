<div class="mb-3">
    <label class="form-label">Data: </label>
    <div class="d-flex flex-wrap mt-2 col-md-12" id="validationInput">
        @foreach($periods as $period)
            <div class="card p-2 me-2 mb-2">
                <div class="form-check">
                    <input class="form-check-input me-3" type="radio" name="data" id="radioDefault{{ $period->format('d') }}" value="{{ $period->format('d-m-Y') }}">
                    <label class="form-check-label d-flex flex-column align-items-center" for="radioDefault{{ $period->format('d') }}">
                        <b class="border-bottom">{{ $period->translatedFormat('l') }}</b>
                        <b class="border-bottom">Dia: {{ $period->format('d') }}</b>
                        <b class="border-bottom">{{ $period->translatedFormat('F') }}</b>
                        <b>Ano: {{ $period->format('Y') }}</b>
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <div id="datalistOptions" class="form-text text-danger">
        @error('data')
        {{ $message }}
        @enderror
    </div>
</div>
