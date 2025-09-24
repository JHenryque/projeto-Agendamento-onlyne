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
                        @foreach($horarios as $indx => $horario)
                            @if($horario->active)
                                @foreach($agendamentosHoje as $agHoje)
                                    @if($agHoje->id_horario === $horario->times)
                                        <tr>
                                            <th scope="row"><br>{{ $indx + 1 }}</th>
                                            <td style="height: 2rem;">
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <div>
                                                        <span><strong>Nome:</strong> {{ $agHoje->name }}</span>
                                                        <p><strong>telefone:</strong> {{ $agHoje->phone }}</p>
                                                    </div>
                                                    <div>
                                                        <span><strong>Tipo Agendamento:</strong> corte de cabelo e barba</span>
                                                        <p><strong>Preço:</strong> R$40,00</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <br><strong>Horario:</strong> {{ $horario->times }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row"><br>{{ $indx + 1 }}</th>
                                    <td>
                                        <div class="text-center text-warning-emphasis col-md-12">
                                            <br>
                                            @if($horario->active)
                                                -- <span class="text-success">Disponivel</span> --
                                            @else
                                                -- <span class="text-danger">Indisponivel</span> --
                                            @endif
                                        </div>
                                    </td>
                                    <td><br><strong>Horario:</strong> {{ $horario->times }}</td>
                                </tr>
                            @endif
                        @endforeach
                                @else
                                    @foreach($horarios as $indx => $horario)
                                        <tr>
                                            <th scope="row">{{ $indx + 1 }}</th>
                                            <td class="text-center text-warning-emphasis col-md-12">
                                                @if($horario->active)
                                                    -- <span class="text-success">Disponivel</span> --
                                                @else
                                                    -- <span class="text-danger">Indisponivel</span> --
                                                @endif
                                            </td>
                                            <td><strong>Horario:</strong> {{ $horario->times }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                    </tbody>
                </table>
                @else
                    <div class="form-text fs-2 text-center mt-4">Ainda não exister horarios adicionados</div>
                @endif
            </div>

            <div class="col-md-4 mb-5 mt-2 rounded border border-4 text-bg-secondary card-body ">
                <h3 class="text-center text-bg-gray">Informação de Agendademnto</h3>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Jose</strong> acabou de cancelar o agendamento | <strong>Data:</strong> 25/09/2026
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

        </div>
    </div>
</x-layout-app>

