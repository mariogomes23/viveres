@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lista de Tipos de viveres</h1>

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
                        @forelse ($tipo as $p )
                        <tr>
                            <td>{{$p->nome}}</td>


                            <td>





                   @can("atualizar_tipoViveres")
                   <a class="btn btn-sm btn-warning" href="{{route("tipo.edit",$p->id)}}">Editar</a>

                   @endcan


                          @can("lista_tipoViveres")
                          <a class="btn btn-sm btn-info" href="{{route("tipo.show",$p->id)}}">Perfil</a>

                          @endcan


                      @can("apagar_tipoViveres")
                      <form action="{{route("tipo.destroy",$p->id)}}" method="post" style="display:inline-flex;">
                        @csrf
                          @method("DELETE")
                          <button class="btn btn-sm btn-danger" type="submit">apagar</button>
                      </form>


                      @endcan



                            </td>
                        </tr>

                        @empty
                        <h2>Sem tipos de viveres disponiveis</h2>

                        @endforelse


                    </tbody>
                </table>
                {{$tipo->links()}}
            </div>
        </div>
    </div>

</div>

@endsection
