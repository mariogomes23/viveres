@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Permissoes :  {{$permission->nome}}</h1>

    <div class="card shadow mb-4">



        <div class="card-body mt-2">
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action active">
                        Informações da Permissão
                      </a>
                      <div class="list-group-item">
                        <h5 class="mb-1">Nome</h5>
                        <p class="mb-0">{{$permission->nome}}</p>
                      </div>



                    </div>
                  </div>


            </div>
        </div>
    </div>

</div>

@endsection
