<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$template->set("title", "La Sillería - Usuarios");
$template->set("description", "Registrate como cliente y obtené grandes beneficios por ser usuario mayorista");
$template->set("keywords","madera guatambu,sillas de madera, sillas, fabrica de sillas,comprar sillas online");
$template->set("favicon", LOGO);
$template->themeInit();
$carrito = new Clases\Carrito();
$usuarios = new Clases\Usuarios();
$usuarioSesion = $usuarios->view_sesion();
if (count($usuarioSesion) != 0) {
    $funciones->headerMove(URL . "/sesion");
}
?>
    <div class="ps-hero bg--cover mb-60">
        <div class="ps-container">
            <h3>Registrarme como usuario</h3>
            <h4>Registrate como usuario y obtené mayores beneficios</h4>
        </div>
    </div>
    <div id="sns_wrapper">
    <div class="ps-container mt-30">
        <h4>¿Ya tenés tu cuenta de cliente? Ingresá haciendo <a href="<?= URL ?>/login" style="color:forestgreen"><b>click aquí</b></a>.<hr/></h4>
        <div class="mb-20"><b>En caso de no tener cuenta y queres crear una cuenta como usuario recurrente, únicamente tenes que completar el siguiente formulario con tus datos.</b></div>
        <?php
        if (isset($_POST["registrarmeBtn"])) {
            $error = 0;
            $cod = substr(md5(uniqid(rand())), 0, 10);
            $nombre = $funciones->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
            $apellido = $funciones->antihack_mysqli(isset($_POST["apellido"]) ? $_POST["apellido"] : '');
            $doc = $funciones->antihack_mysqli(isset($_POST["doc"]) ? $_POST["doc"] : '');
            $email = $funciones->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
            $password1 = $funciones->antihack_mysqli(isset($_POST["password1"]) ? $_POST["password1"] : '');
            $password2 = $funciones->antihack_mysqli(isset($_POST["password2"]) ? $_POST["password2"] : '');
            $postal = $funciones->antihack_mysqli(isset($_POST["postal"]) ? $_POST["postal"] : '');
            $localidad = $funciones->antihack_mysqli(isset($_POST["localidad"]) ? $_POST["localidad"] : '');
            $provincia = $funciones->antihack_mysqli(isset($_POST["provincia"]) ? $_POST["provincia"] : '');
            $pais = $funciones->antihack_mysqli(isset($_POST["pais"]) ? $_POST["pais"] : '');
            $telefono = $funciones->antihack_mysqli(isset($_POST["telefono"]) ? $_POST["telefono"] : '');
            $celular = $funciones->antihack_mysqli(isset($_POST["celular"]) ? $_POST["celular"] : '');
            $invitado = $funciones->antihack_mysqli(isset($_POST["invitado"]) ? $_POST["invitado"] : '0');
            $descuento = $funciones->antihack_mysqli(isset($_POST["descuento"]) ? $_POST["descuento"] : '');
            $fecha = $funciones->antihack_mysqli(isset($_POST["fecha"]) ? $_POST["fecha"] : date("Y-m-d"));

            $usuarios->set("cod", $cod);
            $usuarios->set("nombre", $nombre);
            $usuarios->set("apellido", $apellido);
            $usuarios->set("doc", $doc);
            $usuarios->set("email", $email);
            $usuarios->set("password", $password1);
            $usuarios->set("postal", $postal);
            $usuarios->set("localidad", $localidad);
            $usuarios->set("provincia", $provincia);
            $usuarios->set("pais", $pais);
            $usuarios->set("telefono", $telefono);
            $usuarios->set("celular", $celular);
            $usuarios->set("invitado", $invitado);
            $usuarios->set("descuento", $descuento);
            $usuarios->set("fecha", $fecha);

            if ($invitado == 1) {
                if ($password1 != $password2) {
                    $error = 1;
                    echo "Error las contraseñas no coinciden.<br/>";
                } else {
                    $error = 0;
                    $usuarios->add();
                }
            }  

            $funciones->headerMove(URL . "/sesion");
        }
        ?>
        <div class="col-md-12">
            <form method="post" class="row">
                <div class="row">
                    <input type="hidden" name="invitado" value="1"/>
                    <div class="col-md-6">Nombre:<br/>
                        <input class="form-control  mb-10" type="text" value="<?php echo isset($_POST["nombre"]) ? $_POST["nombre"] : '' ?>" placeholder="Escribir nombre" name="nombre" required/>
                    </div>
                    <div class="col-md-6">Apellido:<br/>
                        <input class="form-control  mb-10" type="text" value="<?php echo isset($_POST["apellido"]) ? $_POST["apellido"] : '' ?>" placeholder="Escribir apellido" name="apellido" required/>
                    </div>
                    <div class="col-md-12">Email:<br/>
                        <input class="form-control  mb-10" type="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : '' ?>" placeholder="Escribir email" name="email" required/>
                    </div>
                    <div class="col-md-12">Teléfono:<br/>
                        <input class="form-control  mb-10" type="text" value="<?php echo isset($_POST["telefono"]) ? $_POST["telefono"] : '' ?>" placeholder="Escribir telefono" name="telefono" required/>
                    </div>
                    <div class="col-md-4">Provincia:<br/>
                        <input class="form-control  mb-10" type="text" value="<?php echo isset($_POST["provincia"]) ? $_POST["provincia"] : '' ?>" placeholder="Escribir provincia" name="provincia" required/>
                    </div>
                    <div class="col-md-4">Localidad:<br/>
                        <input class="form-control  mb-10" type="text" value="<?php echo isset($_POST["localidad"]) ? $_POST["localidad"] : '' ?>" placeholder="Escribir localidad" name="localidad" required/>
                    </div>
                    <div class="col-md-4">Dirección:<br/>
                        <input class="form-control  mb-10" type="text" value="<?php echo isset($_POST["direccion"]) ? $_POST["direccion"] : '' ?>" placeholder="Escribir dirección" name="direccion" required/>
                    </div>
                    <div class="col-md-6 col-xs-6 password">Contraseña:<br/>
                        <input class="form-control  mb-10" type="password" value="<?php echo isset($_POST["password1"]) ? $_POST["password1"] : '' ?>" placeholder="Escribir password" name="password1" required/>
                    </div>
                    <div class="col-md-6 col-xs-6 password">Repetir Contraseña:<br/>
                        <input class="form-control  mb-10" type="password" value="<?php echo isset($_POST["password2"]) ? $_POST["password2"] : '' ?>" placeholder="Escribir repassword" name="password2" required/>
                    </div>

                    <label class="col-md-12 col-xs-12 mt-10 mb-10" style="font-size:16px">
                        <input type="checkbox" name="factura" value="0" onchange="$('.factura').slideToggle()"> Solicitar FACTURA A
                    </label>
                    <div class="col-md-12 col-xs-12 factura" style="display: none;">CUIT:<br/>
                        <input class="form-control  mb-10" type="number" value="<?php echo isset($_POST["doc"]) ? $_POST["doc"] : '' ?>" placeholder="Escribir CUIT" name="doc"/>
                    </div>
                    <div class="col-md-12 col-xs-12 mb-50">
                        <input class="btn btn-success btn-lg" type="submit" value="¡Registrarme!" name="registrarmeBtn"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
$template->themeEnd();
?>