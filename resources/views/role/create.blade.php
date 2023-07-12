@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Adicionar Tipo de Usuario</h1>

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
                    <form action="{{route("role.store")}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="{{old("nome")}}" class="form-control @error('nome') is-invalid @enderror" id="name" name="nome">
                            @error('name')
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
