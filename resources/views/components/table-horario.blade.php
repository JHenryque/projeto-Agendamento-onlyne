<table class="table">
    <thead>
    <tr>
        <th scope="col" class="d-flex flex-wrap">Horarios:</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">

    @foreach($horarios as $horario)
        <tr>
            <td class="d-flex justify-content-between lh-sm">
                <div class="d-flex flex-wrap col-md-8 align-items-center justify-content-between">
                    <div>{{ $horario->times }}</div>
                    @if($horario->active === 1)
                        <div class="text-success p-1 rounded"><i class="fa-solid fa-circle-check fs-5 me-2"></i> Disponivel--</div>
                    @else
                        <div class="text-danger p-1 rounded"><i class="fa-solid fa-circle-xmark fs-5 me-2"></i> Indisponivel</div>
                    @endif

                </div>
                <div class="col-lg-2 d-flex flex-wrap align-self-center justify-content-end">
                    <a href="{{ route('client.edit.horario', ['id' => $horario->id]) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('client.delete.horario', ['id'=> $horario->id]) }}" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
