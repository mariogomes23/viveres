@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Viveres :  {{$viveres->marca}}</h1>

    <div class="card shadow mb-4">



        <div class="card-body mt-2">
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action active">
                        Informações do Viveres
                      </a>
                      <div class="list-group-item">
                        <h5 class="mb-1">Marca</h5>
                        <p class="mb-0">{{$viveres->marca}}</p>
                      </div>
                      <div class="list-group-item">
                        <h5 class="mb-1">Quantidade</h5>
                        <p class="mb-0">{{$viveres->quantidade}}</p>
                      </div>
                      <div class="list-group-item">
                        <h5 class="mb-1">Tipo de Viveres</h5>
                        <p class="mb-0">{{$viveres->tipo->nome}}</p>
                      </div>

               
                    </div>
                  </div>


            </div>
        </div>
    </div>

</div>

@endsection
