<x-layout-app title="Colaboradores">
    <div class="container-fluid text-bg-light h-100">
        <h3 class="text-primary">Colaboradores</h3>
        <hr>
        <x-profile-user />
        <hr>
        <div class="my-5">
            <a href="{{ route('colaboration.create.colaborator') }}" class="btn btn-outline-primary ms-5">Criar novo Colaborador</a>
        </div>
        <div class="row col-lg-12 justify-content-center">
{{--            @if($colaborators->count() === 0)--}}
{{--                <div class="text-center my-5 text-info">--}}
{{--                    <p class="display-6">Não existe colaborador</p>--}}
{{--                    <a href="{{ route('colaboration.create.colaborator') }}" class="btn btn-primary">Criar novo Colaborador</a>--}}
{{--                </div>--}}

{{--            @else--}}
               <div class="col-lg-10 mb-5 table-responsive">
                   <table class="table table-hover">
                       <thead class="table-dark">
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

                       <x-table-colaborators :colaborators/>
                   </table>
               </div>
{{--            @endif--}}
        </div>
    </div>
</x-layout-app>
