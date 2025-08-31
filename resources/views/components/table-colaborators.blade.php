<tbody>

    @foreach($colaborators as $colaborator)
    <tr>
        <th scope="row">2</th>
        <td>{{ $colaborator->name }}</td>
        <td>@fat</td>
        <td><span class="badge bg-danger">Não</span></td>
        <td>Colaborador</td>
        <td>Colaborador</td>
        <td>
            @can('admin')
                <div class="btn-group m-0" role="group" aria-label="Basic mixed styles example">
                    @if(empty($colaborator->deleted_at))
                        <a href="#" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-pencil"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                    @else
                        <a href="#" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-arrow-up me-2"></i></a>
                    @endif
                </div>
            @endcan
        </td>
    </tr>
    @endforeach

</tbody>
