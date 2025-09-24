<x-layout-app title="Agendar Horario">
   <div class="container-fluid text-bg-light h-100">
       <x-profile-client />
       <hr>

       <div>

           <div class="container">
                   <h1 class="my-4">Novo Agendamento</h1>

               @if(session('erro'))
                   <div class="alert alert-danger">{{ session('erro') }}</div>
               @endif

               <form action="{{ route('agendamentos.submit.horarios') }}" method="POST">
                   @csrf

                   <div class="form-floating mb-3">
                       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('name') }}" aria-describedby="validationInput">
                       <label for="floatingInput">Nome Completo: </label>
                       <div id="validationInput" class="form-text text-danger">
                           @error('name')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                   <div class="form-floating mb-3">
                       <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('phone') }}" aria-describedby="validationInput">
                       <label for="floatingInput">Telefone: </label>
                       <div id="validationInput" class="form-text text-danger">
                           @error('phone')
                           {{ $message }}
                           @enderror
                       </div>
                   </div>

                   <x-input-atendimento :atendimentos="$atendimentos" />

                   <x-input-data :periods="$periods" />

                   <x-input-horario :horarios="$horarios" />

                   <div class="d-flex flex-wrap justify-content-between mt-5 mb-5">
                       <button type="submit" class="btn btn-success">Agendar</button>
                       <a href="{{ route('home') }}" class="btn btn-outline-dark ">Voltar!</a>
                   </div>

               </form>
           </div>

           <script>
               document.getElementById('data').addEventListener('change', function() {
                   let data = this.value;
                   let selectHora = document.getElementById('hora');
                   selectHora.innerHTML = '<option>Carregando...</option>';

                   fetch(`/agendamentos/horarios-disponiveis?data=${data}`)
                       .then(res => res.json())
                       .then(horarios => {
                           selectHora.innerHTML = '';
                           if(horarios.length === 0){
                               selectHora.innerHTML = '<option>Nenhum horário disponível</option>';
                           } else {
                               horarios.forEach(hora => {
                                   let opt = document.createElement('option');
                                   opt.value = hora;
                                   opt.textContent = hora;
                                   selectHora.appendChild(opt);
                               });
                           }
                       });
               });
           </script>
       </div>
   </div>
</x-layout-app>
