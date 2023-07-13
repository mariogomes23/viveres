@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Tipo de Usuarios :  {{$role->nome}}</h1>

    <div class="card shadow mb-4">



        <div class="card-body mt-2">
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action active">
                        Informações do Tipo de Usuarios
                      </a>
                      <div class="list-group-item">
                        <h5 class="mb-1">Nome</h5>
                        <p class="mb-0">{{$role->nome}}</p>
                      </div>
                      <div class="list-group-item">
                        <h5 class="mb-1">Permissões</h5>
                       <ul>

                        @foreach ($role->permissions as $permission )

                           <li>{{$permission->nome}}</li>
                        @endforeach
                       </ul>
                      </div>



                    </div>
                  </div>


            </div>
        </div>
    </div>

</div>

@endsection
