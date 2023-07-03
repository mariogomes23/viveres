@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Adicionar Viveres</h1>

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
                    <form action="{{route("viveres.store")}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <label for="name">Marca</label>
                            <input type="text" value="{{old("marca")}}" class="form-control @error('marca') is-invalid @enderror" id="name" name="marca">
                            @error('marca')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Quantidade</label>
                            <input type="number"  value="{{old("quantidade")}}" class="form-control @error('quantidade') is-invalid @enderror"  name="quantidade">
                            @error('quantidade')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="patente">Tipo de Viveres</label>
                            <select class="form-control @error('tipo_id') is-invalid @enderror" id="patente" name="tipo_id">
                                <option value="">Selecione </option>
                                @foreach ($tipo as $p )
                                <option value="{{$p->id}}">{{$p->nome}}</option>
                                @endforeach


                            </select>
                            @error('tipo_id')
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
