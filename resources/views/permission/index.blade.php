@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lista de Permissões</h1>

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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>

                            <th>Opcoes</th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($permission as $p )
                        <tr>
                            <td>{{$p->nome}}</td>


                            <td>





                     <a class="btn btn-sm btn-warning" href="{{route("permission.edit",$p->id)}}">Editar</a>

                            <a class="btn btn-sm btn-info" href="{{route("permission.show",$p->id)}}">Perfil</a>



                           <form action="{{route("permission.destroy",$p->id)}}" method="post" style="display:inline-flex;">
                            @csrf
                              @method("DELETE")
                              <button class="btn btn-sm btn-danger" type="submit">apagar</button>
                          </form>





                            </td>
                        </tr>

                        @empty
                        <h2>Sem Permissões</h2>

                        @endforelse


                    </tbody>
                </table>
                {{$permission->links()}}
            </div>
        </div>
    </div>

</div>

@endsection
