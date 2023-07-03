@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Tipo de  Viveres</h1>

    <div class="card shadow mb-4">

          @if (Session::has("message"))
          <div class="card-header mb-4">
            <div class="alert alert-danger mb-2  " role="alert">
              {{ Session::get("message")}}
              </div>

         </div>

          @endif

        <div class="card-body mt-2">
            <div class="table-responsive">
                <div class="container-fluid">
                    <form action="{{route("tipo.update",$tipo->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="{{$tipo->nome}}" class="form-control @error('nome') is-invalid @enderror"  name="nome">
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>



            </div>
        </div>
    </div>

</div>

@endsection
