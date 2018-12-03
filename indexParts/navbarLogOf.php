
<nav class="navbar navbar-expand-lg fondonav">
  <a class="navbar-brand text-white" href="#">Produccion Web</a>
  <button class="navbar-toggler "  type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon " id="navbartoggle"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <form class="form-inline my-5 my-lg-0 ml-auto .text-white " method="post" action="sessions/procesar_session.php">
        <input class="form-control mr-sm-2 " type="text" placeholder="Usuario" name="usuario">
        <input class="form-control mr-sm-2" type="password" placeholder="Contraseña" name="contraseña">
        <button class="btn btn-primary my-2 my-sm-0 mr-2 text-white " type="submit">LogIn</button>
        <!--
        <a class="btn btn-success my-2 my-sm-0 text-white" type="submit" data-toggle="modal" data-target="#exampleModalCenter">SingUp</a>
        -->
    </form>
  </div>
</nav>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Registrarme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>











