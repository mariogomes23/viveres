
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lista de Viveres</h1>

    <div class="card shadow mb-4">


        <div class="card-body mt-2">
            <div class="table-responsive">
                <table style="border-collapse: colapse;border:1px solid black;" id="dataTable" width="100%" cellspacing="0">
                    <thead style="border-collapse: colapse;border:1px solid black;" >
                        <tr style="border-collapse: colapse;border:1px solid black;" >
                            <th>Marca</th>
                            <th>Tipo de viveres</th>
                            <th>quantidade</th>
                            <th>Data de criacao</th>


                        </tr>
                    </thead>

                    <tbody style="border-collapse: colapse;border:1px solid black;" >
                        @forelse ($viveres as $p )
                        <tr style="border-collapse: colapse;border:1px solid black;" >
                            <td>{{$p->marca}}</td>
                            <td>{{$p->tipo->nome}}</td>
                            <td>{{$p->quantidade}}</td>
                            <td>{{$p->created_at}}</td>


                        </tr>

                        @empty
                        <h2>Sem viveres disponiveis</h2>

                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

