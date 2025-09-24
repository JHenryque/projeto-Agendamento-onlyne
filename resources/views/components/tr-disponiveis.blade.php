<tr>
    <th scope="row"><br>{{ $index + 1 }}</th>
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
