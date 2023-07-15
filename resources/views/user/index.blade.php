@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lista de Usuarios</h1>

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
                            <th>Email</th>
                            <th>Patente</th>
                            <th>Permissões</th>
                            <th>Tipo de Usuario</th>
                            <th>Opcoes</th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($user as $p )
                        <tr>
                            <td>{{$p->name}}</td>
                            <td>{{$p->email}}</td>
                            <td>{{$p->patente}}</td>
                            <td>

                               <ul>
                                @forelse ($p->role->permissions as $permission )
                                <li>
                                    {{ $permission->nome}}
                                </li>

                                 @empty

                                 <li>sem permissões</li>


                                @endforelse



                               </ul>
                            </td>
                            <td>{{$p->role->nome}}</td>

                            <td>

                           @can("atualizar_usuarios")
                           <a class="btn btn-sm btn-warning" href="{{route("user.edit",$p->id)}}">Editar</a>

                           @endcan
                             @can("lista_usuarios")
                             <a class="btn btn-sm btn-info" href="{{route("user.show",$p->id)}}">Perfil</a>

                             @endcan
                            @can("apagar_usuarios")
                            <form action="{{route("user.destroy",$p->id)}}" method="post" style="display:inline-flex;">
                                @csrf
                                  @method("DELETE")
                                  <button class="btn btn-sm btn-danger" type="submit">apagar</button>
                              </form>


                            @endcan



                            </td>
                        </tr>

                        @empty
                        <h2>Sem usuarios disponiveis</h2>

                        @endforelse


                    </tbody>

                </table>
                {{$user->links()}}
            </div>
        </div>
    </div>

</div>

@endsection
