<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top"
         role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"
                    data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
              <i class="fa fa-dashboard fa-fw"></i> Dashboard
            </a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <?= $_SESSION['administrador']['nome'] ?>
                  <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href='index.php?acao=editar_usuario&id=<?= $_SESSION['administrador']['id']; ?>'>
                      <i class="fa fa-user fa-fw"></i> Perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?acao=logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Usuarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li><a href="index.php?acao=novo_usuario">Novo</a></li>
                           <li><a href="index.php?acao=listar_usuarios">Listar</a></li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> Cargos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li><a href="index.php?acao=novo_cargo">Novo</a></li>
                           <li><a href="index.php?acao=listar_cargos">Listar</a></li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
