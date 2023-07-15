@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Tipo de Usuario</h1>

    <div class="card shadow mb-4">

          @if (Session::has("message"))
          <div class="card-header mb-4">
            <div class="alert alert-success mb-2  " role="alert">
              {{ Session::get("message")}}
              </div>

         </div>

          @endif

        <div class="card-body mt-2 mb-10">
            <div class="table-responsive">
                <div class="container-fluid">
                    <form action="{{route("role.update",$role->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="{{$role->nome}}" class="form-control @error('nome') is-invalid @enderror"  name="nome">
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>





                </div>



            </div>
        </div>












        <div class="card-body mt-10">
            <div class="table-responsive">
                <div class="container-fluid">
                    <form action="{{route("removerPermissionDoRole",$role->id)}}" method="POST">
                        @csrf
                        @method("POST")


                        <button type="submit" class="btn btn-primary">Remover Permissões</button>
                    </form>
                    <form action="{{route("adicionarPermissionInRole",$role->id)}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <label for="name">Selecione a Permissão</label>


                            @foreach ($permissions as $permission)
                            <div>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                       {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                <label>{{ $permission->nome }}</label>
                            </div>
                        @endforeach

                        </div>



                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>





                </div>



            </div>
        </div>
    </div>

</div>

@endsection
