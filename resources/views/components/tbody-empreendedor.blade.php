@foreach($users as $user)
    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @empty($user->email_verified_at)
                <div class="badge bg-danger">Não</div>
            @else
                <div class="badge bg-success">Sim</div>
        @endempty
        <td>{{ $user->role }}</td>
        <td>{{ $user->empreendedor->phone }}</td>
        <td>{{ $user->empreendedor->cidade }}</td>

        @can('admin')
            <td>
                @foreach($cols as $col)
                    @if($user->col_id === $col->id)
                        {{ $col->name }}
                    @endif
                @endforeach
            </td>
        @endcan

        <td>
            @can('admin')
                <div class="btn-group m-0" role="group" aria-label="Basic mixed styles example">

                    @if($user->role != 'admin')
                        @if(empty($user->deleted_at))
                            <a href="{{ route('empreendedor.edit.empreendedores', ['id'=> $user->id]) }}" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-pencil"></i></a>
                            <a href="{{ route('empreendedor.delete.empreendedores', ['id'=> $user->id]) }}" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="{{ route('empreendedor.details.empreendedores', ['id'=> $user->id]) }}" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                        @else
                            <a href="{{ route('empreendedor.restore.empreendedores', ['id'=> $user->id]) }}" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-arrow-up pe-1"></i></a>
                        @endif
                    @endif
                </div>
            @endcan
        </td>
    </tr>
@endforeach
