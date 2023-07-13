@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Adicionar Usuario</h1>

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
                    <form action="{{route("user.store")}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="{{old("name")}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"  value="{{old("email")}}" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="patente">Patente</label>
                            <select class="form-control @error('patente') is-invalid @enderror" id="patente" name="patente">
                                <option value="">Selecione uma patente</option>
                                @foreach ($patentes as $p )
                                <option value="{{$p}}">{{$p}}</option>
                                @endforeach


                            </select>
                            @error('patente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">TIpo de usuário</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" id="role" name="role_id">
                                <option value="">Selecione</option>
                                @foreach ($roles as $p )
                                <option value="{{$p->id}}">{{$p->nome}}</option>
                                @endforeach

                            </select>
                            @error('role_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="name">Senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" >
                            @error('password')
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
