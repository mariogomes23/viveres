<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route("painel")}}">
        <div class="sidebar-brand-icon ">
            <img src="{{asset("img/logo.jpg")}}" width="60" height="60" style="border-radius: 7px;margin-top:10px;" alt="" srcset="">
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route("painel")}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Painel</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">





    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route("user.index")}}" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">

            <span>Usuario</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Usuario</h6>

          @can("isAdmin")

          <a class="collapse-item" href="{{route("user.create")}}">Adicionar Usuario</a>
          <a class="collapse-item" href="{{route("user.index")}}">Lista de Usuario</a>

          @endcan




            </div>
        </div>
    </li>




    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route("viveres.index")}}" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">

        <span>Viveres</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Viveres</h6>
          @can("isFornecedor")
          <a class="collapse-item" href="{{route("viveres.create")}}">Adicionar Viveres</a>

          @endcan

          

            <a class="collapse-item" href="{{route("viveres.index")}}">Lista de Viveres</a>

        </div>
    </div>
</li>



    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route("tipo.index")}}" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">

            <span>Tipo de Viveres</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tipo de Viveres</h6>
              @can("isFornecedor")
              <a class="collapse-item" href="{{route("tipo.create")}}">Adicionar Tipo de  Viveres</a>

              @endcan
                <a class="collapse-item" href="{{route("tipo.index")}}">Lista de Tipo de  Viveres</a>

            </div>
        </div>
    </li>




</ul>
