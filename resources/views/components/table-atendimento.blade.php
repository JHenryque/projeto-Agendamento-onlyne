<table class="table">
    <thead>
    <tr>
        <th scope="col" class="d-flex flex-wrap">Tipo de Atendimentos:</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($tipoAtendimentos as $tipoAtendimento)
        <tr>
            <td class="d-flex justify-content-between lh-sm">
                <div class="row">
                    <span><b>Nome:</b> {{ $tipoAtendimento->name }}</span>
                    <span><b>Preço:</b> {{ $tipoAtendimento->preco }}</span>
                    @if($tipoAtendimento->observacao)
                        <p><b>Observação: </b> {{ $tipoAtendimento->observacao }}</p>
                    @else
                        {{ "" }}
                    @endif
                </div>
                <div class="col-lg-2 d-flex flex-wrap align-self-center justify-content-end">
                    <a href="{{ route('client.edit.atendimento', ['id' => $tipoAtendimento->id]) }}" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('client.deleted.atendimento', ['id'=> $tipoAtendimento->id]) }}" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
