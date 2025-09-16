<x-layout-app title="Planos">

    <div class="container-fluid h-100 text-bg-primary p-4">
        <h3>Planos</h3>
        <hr>
        <x-profile-client/>
        <hr>

        <div class="mt-lg-5 display-6 container-sm text-bg-dark p-4 rounded mb-3"><b class="text-danger">Atenção:</b> Planos recomendados com 10% de descontos sera só avista!</div>

        <div class="row justify-content-center align-items-center mt-lg-5 gap-3">
            <div class="shadow-lg col-md-3 border pt-2 pb-2 rounded text-bg-secondary mb-3">
                <div class="shadow-sm rounded p-3 text-center text-dark">
                    <h3 class="mb-lg-5">Plano Mensal</h3>
                    <p class="text-bg-warning p-4 rounded">Esse plano nao contem desconto por ser Mensal</p>
                    <h1 class="mt-3 mb-5">R$ 70,00 Reais</h1>
                    <button type="submit" class="btn btn-primary">Assine Já!</button>
                </div>
            </div>
            <div class="shadow-lg col-md-3 border pt-2 pb-2 rounded text-bg-secondary mb-3">
                <div class="shadow-sm rounded p-4 text-center text-bg-light">
                    <h3 class="mb-lg-5">Plano Semestral</h3>
                    <span class="opacity-50"><s>R$ 420,00 Reais</s></span><br>
                    <span class="text-info">Com 10% Desconto</span>
                     <div class="col-md-12 text-bg-success rounded p-2">* Plano Recomendado *</div>
                    <h1 class="mt-3 ">R$ 378,00</h1>
                    <p class="form-text mb-4">Preço com desconto, só a vista</p>

                    <button type="submit" class="btn btn-primary">Assine Já!</button>
                </div>
            </div>

            <div class="shadow-lg col-md-3 border pt-2 pb-2 rounded text-bg-secondary">
                <div class="shadow-sm rounded p-4 text-center text-bg-light ">
                    <h3 class="mb-lg-5">Plano Anal</h3>
                    <span class="opacity-50"><s>R$ 840,00 Reais</s></span><br>
                    <span class="text-info">Com 10% Desconto</span>
                    <div class="col-md-12 text-bg-success rounded p-2">* Plano Recomendado *</div>
                    <h1 class="mt-3">R$ 776,00</h1>
                    <p class="form-text mb-4">Preço com desconto, só a vista</p>
                    <button type="submit" class="btn btn-primary">Assine Já!</button>
                </div>
            </div>
        </div>
    </div>
</x-layout-app>
