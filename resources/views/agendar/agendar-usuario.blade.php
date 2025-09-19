<x-layout-app title="Agendar Horario">
   <div class="container-fluid text-bg-light h-100">
       <h3 class="text-primary">Agendar Horario</h3>
       <hr>
       <x-profile-client />
       <hr>
       <div>
           <div class="container">
               <h1>Novo Agendamento</h1>

               @if(session('erro'))
                   <div class="alert alert-danger">{{ session('erro') }}</div>
               @endif

               <form action="#" method="post">
                   @csrf
                   <div class="mb-3">
                       <label>Nome</label>
                       <input type="text" name="nome" class="form-control" required>
                   </div>
                   <div class="mb-3">
                       <label>Telefone</label>
                       <input type="text" name="phone" class="form-control">
                   </div>
                   <div class="mb-3">
                       <label>Data</label>
                       <input type="date" name="data" id="data" class="form-control" value="{{ old('data', date('Y-m-d')) }}" required>
                   </div>

                   <div class="mb-3">
                       <label>Tipo de Atendimento</label>
                       <select name="hora" id="hora" class="form-control" required>
                           <option value="">Selecione uma o tipo atendimento</option>
                           @foreach($atendimentos as $atendimento)

                                   <option class="d-flex flex-column" value="{{ $atendimento->id }}">
                                       <p>Name: {{ $atendimento->name }}</p>
                                       <p>Preço: {{ $atendimento->preco }}</p>
                                       @if($atendimento->observacao)
                                           <p>Observacao: {{ $atendimento->observacao }}</p>
                                       @endif
                                   </option>

                           @endforeach
                       </select>
                   </div>

                   <div class="mb-3">
                       <label>Horário</label>
                       <select name="hora" id="hora" class="form-control" required>
                           <option value="">Selecione uma data primeiro</option>
                              @foreach($horarios as $horario)
                                   @if($horario->active)
                                     <option value="{{ $horario->id }}">{{ $horario->times }}</option>
                                    @else
                                        <option class="text-center">Nenhum horário disponível</option>
                                       @break
                                   @endif
                              @endforeach
                       </select>
                   </div>
                   <div class="mb-3">
                       <label>Observação</label>
                       <textarea name="observacao" class="form-control"></textarea>
                   </div>
                   <button type="submit" class="btn btn-success">Agendar</button>
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
