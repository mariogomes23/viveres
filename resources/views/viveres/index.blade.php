@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lista de Viveres</h1>

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
                            <th>Marca</th>
                            <th>Tipo de viveres</th>
                            <th>quantidade</th>
                            <th>Data de criacao</th>
                            <th>Opcoes</th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($viveres as $p )
                        <tr>
                            <td>{{$p->marca}}</td>
                            <td>{{$p->tipo->nome}}</td>
                            <td>{{$p->quantidade}}</td>
                            <td>{{$p->created_at}}</td>

                            <td>


                  @can("atualizar_viveres")
                  <a class="btn btn-sm btn-warning" href="{{route("viveres.edit",$p->id)}}">Editar</a>

                  @endcan


                       @can("lista_viveres")
                       <a class="btn btn-sm btn-info" href="{{route("viveres.show",$p->id)}}">Perfil</a>

                       @endcan


@can("apagar_viveres")

<form action="{{route("viveres.destroy",$p->id)}}" method="post" style="display:inline-flex;">
    @csrf
      @method("DELETE")
      <button class="btn btn-sm btn-danger" type="submit">apagar</button>
  </form>

@endcan

                            </td>
                        </tr>

                        @empty
                        <h2>Sem viveres disponiveis</h2>

                        @endforelse

                    </tbody>
                </table>
                {{$viveres->links()}}
            </div>
        </div>
    </div>

</div>

@endsection
