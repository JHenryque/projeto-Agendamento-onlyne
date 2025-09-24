@foreach($agendamentosHoje as $agHoje)
    @if($agHoje->id_horario === $horario->times)
        <tr>
            <th scope="row"><br>{{ $index + 1 }}</th>
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
