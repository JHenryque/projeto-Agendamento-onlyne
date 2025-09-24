<x-layout-app title="Home">
    <div class="container-fluid text-bg-light h-100">
        <div class="row p-3">

            <x-profile-client/>
            <hr>
        </div>

        <div class="d-flex justify-content-around flex-wrap-reverse gap-3 card-body">

            <div class="col-md-7 mb-5 mt-2 rounded overflow-auto">

                @if($horarioIsTrue)
                    <div class="mb-3">
                        <a class="btn btn-outline-primary float-sm-end mb-3" href="{{ route('agendamentos.horarios.disponiveis') }}"><i class="fas fa-calendar-plus me-2 text-dark"></i>Agendar</a>
                    </div>

                    <table class="table table-hover mt-3 ps-3 table-responsive-sm">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-center" style="font-size: 1.3rem;">Atendimento</th>
                            <th scope="col">
                                <input type="date" name="data" value="{{ old('data', date('Y-m-d')) }}" style="border: 0;outline: 0;font-size: 1.3rem;">
                            </th>
                        </tr>
                        </thead>

                        <tbody style="height: 500px">
                            @if($agendamentosHoje->count())
                                @foreach($horarios as $index => $horario)
                                    @if($horario->active)
                                        <x-tr-agendamento :agendamentosHoje="$agendamentosHoje" :horario="$horario" :index="$index"/>
                                    @else
                                        <x-tr-disponiveis :index="$index" :horario="$horario" />
                                    @endif
                                @endforeach
                            @else
                                @foreach($horarios as $index => $horario)
                                    <x-tr-disponiveis :index="$index" :horario="$horario" />
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                @else
                    <div class="form-text fs-2 text-center mt-4">Ainda não exister horarios adicionados</div>
                @endif
            </div>

            <x-informacao-agendamento />


        </div>
    </div>
</x-layout-app>

