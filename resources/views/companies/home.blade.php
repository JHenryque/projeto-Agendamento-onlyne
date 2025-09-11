<x-layout-app title="Home">
    <div class="container-fluid text-bg-light h-100">
        <div class="row p-3">

            <x-profile-client/>
            <hr>
        </div>

        <div class="d-flex justify-content-around flex-wrap-reverse gap-3 card-body">

            <div class="col-md-7 mb-5 mt-2 rounded overflow-auto">
                <div class="mb-3">
                    <a class="btn btn-outline-primary float-sm-end mb-3" href="#"><i class="fas fa-calendar-plus me-2 text-dark"></i>Agendar</a>
                </div>
                <table class="table table-hover mt-3 ps-3 table-responsive-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center" style="font-size: 1.3rem;">Atendimento</th>
                        <th scope="col">
                            <input type="date" name="data" value="{{ old('data', date('Y-m-d')) }}" style="border: 0;outline: 0;font-size: 1.3rem;">
                        </th>
                    </tr>
                    </thead>

                    <tbody style="height: 500px">
                    <tr>
                        <th scope="row">1</th>
                        <td class="text-center text-warning"> -- disponivel --</td>
                        <td><strong>Horario:</strong> 07:00</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td class="text-center text-warning"> -- disponivel --</td>
                        <td><strong>Horario:</strong> 08:00</td>
                    </tr>
                    <tr>
                        <th scope="row"><br></br>3</th>
                        <td class="d-flex justify-content-between flex-wrap">
                            <div class="align-items-center pe-2">
                                <br>
                                <p><strong>Nome:</strong> Joao</p>
                                <p><strong>telefone:</strong> 87 1234-5678</p>
                            </div>
                            <div class="block">
                                <br>
                                <p><strong>Tipo Agendamento:</strong> corte de cabelo e barba</p>
                                <p><strong>Preço:</strong> $ 40,00</p>
                            </div>
                        </td>
                        <td class="mb-5"><br><br><strong>Horario:</strong> 09:00</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td class="text-center text-warning"> -- disponivel --</td>
                        <td><strong>Horario:</strong> 10:00</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td class="text-center text-warning"> -- disponivel --</td>
                        <td><strong>Horario:</strong> 11:00</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td class="text-center text-warning"> -- disponivel --</td>
                        <td><strong>Horario:</strong> 13:00</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td class="text-center text-warning"> -- disponivel --</td>
                        <td><strong>Horario:</strong> 14:00</td>
                    </tr>
                    <tr>
                        <th scope="row"><br></br>8</th>
                        <td class="d-flex justify-content-between flex-wrap">
                            <div class="align-items-center pe-2">
                                <br>
                                <p><strong>Nome:</strong> Joao</p>
                                <p><strong>telefone:</strong> 87 99810-6866</p>
                            </div>
                            <div>
                                <br>
                                <p><strong>Tipo Agendamento:</strong> corte de cabelo</p>
                                <p><strong>Preço:</strong> $ 25,00</p>
                            </div>
                        </td>
                        <td class="mb-5"><br><br><strong>Horario:</strong> 15:00</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td class="text-center text-warning"> -- disponivel --</td>
                        <td><strong>Horario:</strong> 16:00</td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td class="text-center text-warning"> -- disponivel --</td>
                        <td><strong>Horario:</strong> 17:00</td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-md-4 mb-5 mt-2 rounded border border-4 text-bg-secondary card-body ">
                <h3 class="text-center text-bg-gray">Informação de Agendademnto</h3>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Jose</strong> acabou de cancelar o agendamento | <strong>Data:</strong> 25/09/2026
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

        </div>
    </div>
</x-layout-app>

