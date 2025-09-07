<x-layout-app title="Home">
    <div class="container-fluid text-bg-light h-100">
        <div class="row p-1">
            <h3 class="text-primary">Home</h3>
            <hr>
            <x-profile-user/>
            <hr>
        </div>

        <div class="d-flex justify-content-around flex-wrap-reverse gap-1 ">
            <div class="col-md-7 mb-5 mt-2 rounded">
                <table class="table table-responsive table-hover mt-3 ps-3">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th>Tipo Agendamento</th>
                        <th>Preço</th>
                        <th scope="col">Data - Hora</th>
                    </tr>
                    </thead>

                    <tbody class="overflow-auto">
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>8712345678</td>
                            <td>Corte degrade navalha</td>
                            <td>$ 25,00</td>
                            <td>25-09-2025</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Mark</td>
                            <td>8712345678</td>
                            <td>Corte degrade navalha</td>
                            <td>$ 25,00</td>
                            <td>15-09-2025</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Mark</td>
                            <td>8712345678</td>
                            <td>Corte degrade navalha</td>
                            <td>$ 25,00</td>
                            <td>05-09-2025</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-md-4 mb-5 mt-2 rounded border border-4 text-bg-secondary">
                <h3 class="text-center text-bg-gray">Informação de Agendademnto</h3>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Jose</strong> acabou de cancelar o agendamento, 25/09/2026
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

        </div>
    </div>
</x-layout-app>

