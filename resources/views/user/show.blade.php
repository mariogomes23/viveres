@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Usuario :  {{$user->name}}</h1>

    <div class="card shadow mb-4">

          @if (Session::has("message"))
          <div class="card-header mb-4">
            <div class="alert alert-success mb-2  " role="alert">
              {{ Session::get("message")}}
              </div>

         </div>

          @endif

        <div class="card-body mt-2">
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action active">
                        Informações do Usuário
                      </a>
                      <div class="list-group-item">
                        <h5 class="mb-1">Nome</h5>
                        <p class="mb-0">{{$user->name}}</p>
                      </div>
                      <div class="list-group-item">
                        <h5 class="mb-1">Email</h5>
                        <p class="mb-0">{{$user->email}}</p>
                      </div>
                      <div class="list-group-item">
                        <h5 class="mb-1">Patente</h5>
                        <p class="mb-0">{{$user->patente}}</p>
                      </div>
                      <div class="list-group-item">
                        <h5 class="mb-1">tipo de Usuario</h5>
                        <p class="mb-0">{{$user->role}}</p>
                      </div>
                      <div class="list-group-item">
                        <h5 class="mb-1">Data de Criação</h5>
                        <p class="mb-0">{{$user->created_at}}</p>
                      </div>
                    </div>
                  </div>


            </div>
        </div>
    </div>

</div>

@endsection
