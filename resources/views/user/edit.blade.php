@extends("master")


@section("conteudo")

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Usuario</h1>

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
                    <form action="{{route("user.update",$user->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror"  name="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"  value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="patente">Patente</label>
                            <select class="form-control @error('patente') is-invalid @enderror" id="patente" name="patente">
                                <option value="">Selecione uma patente</option>
                                @foreach ($patentes as $p )
                                <option value="{{$p}}" {{ old('patente') == $p? 'selected' : '' }}>{{$p}}</option>
                                @endforeach


                            </select>
                            @error('patente')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">TIpo de usuário</label>
                            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                <option value="">Selecione</option>
                                @foreach ($roles as $p )
                                <option value="{{$p}}" {{ old('role') == $p ? 'selected' : '' }}>{{$p}}</option>
                                @endforeach

                            </select>
                            @error('role')
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
