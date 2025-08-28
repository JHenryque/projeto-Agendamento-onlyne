<x-layout-app title="Colaboradores">
    <div class="container-fluid text-bg-light h-100">
        <h3 class="text-primary">Colaboradores</h3>
        <hr>
        <x-profile-user />
        <hr>
        <div class="my-5">
            <a href="#" class="btn btn-outline-primary ms-5">Criar novo Colaborador</a>
        </div>
        <div class="row col-lg-12 justify-content-center">
{{--            @if($colaborators->count() === 0)--}}
{{--                <div class="text-center my-5 text-info">--}}
{{--                    <p class="display-6">Não existe colaborador</p>--}}
{{--                    <a href="#" class="btn btn-primary">Criar novo Colaborador</a>--}}
{{--                </div>--}}

{{--            @else--}}
               <div class="col-lg-10 mb-5">
                   <table class="table table-striped table-hover">
                       <thead class="table-primary">
                       <tr>
                           <th scope="col">#</th>
                           <th>Nome</th>
                           <th>E-mail</th>
                           <th>Active</th>
                           <th>Department</th>
                           <th>Role</th>
                           <th></th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <th scope="row">1</th>
                           <td>Mark</td>
                           <td>@mdo</td>
                           <td><span class="badge bg-success">Sim</span></td>
                           <td>Colaborador</td>
                           <td>Colaborador</td>
                           <td></td>
                       </tr>
                       <tr>
                           <th scope="row">2</th>
                           <td>Jacob</td>
                           <td>@fat</td>
                           <td><span class="badge bg-danger">Não</span></td>
                           <td>Colaborador</td>
                           <td>Colaborador</td>
                           <td></td>
                       </tr>
                       <tr>
                           <th scope="row">3</th>
                           <td>John</td>
                           <td>@social</td>
                           <td><span class="badge bg-success">Sim</span></td>
                           <td>Colaborador</td>
                           <td>Colaborador</td>
                           <td></td>
                       </tr>
                       </tbody>
                   </table>
               </div>
{{--            @endif--}}
        </div>
    </div>
</x-layout-app>
