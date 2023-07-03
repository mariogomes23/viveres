@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Viveres</h1>

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
                    <form action="{{route("viveres.update",$viveres->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="name">Marca</label>
                            <input type="text" value="{{$viveres->marca}}" class="form-control @error('marca') is-invalid @enderror"  name="marca">
                            @error('marca')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Quantidade
                            </label>
                            <input type="number"  value="{{$viveres->quantidade}}" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade">
                            @error('quantidade')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="patente">Tipo de Viveres</label>
                            <select class="form-control @error('tipo_id') is-invalid @enderror"  name="tipo_id">
                                <option value="">Selecione</option>
                                @foreach ($tipo as $p )
                                <option value="{{$p->id}}" {{ old('tipo_id') == $p? 'selected' : '' }}>{{$p->nome}}</option>
                                @endforeach


                            </select>
                            @error('patente')
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
