<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión | SIGA</title>
    <link rel="shortcut icon" href="img/icon_pra.ico" type="image/png"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    <script src="js/loader.js"></script>
</head>
<body>
    
<div id="load-content" class="loader-wrapper">
    <div id="id-loading" class="loader-small"></div>
</div>
<div class="container">
   
    <div class="login-form"> <!-- -->
        <div class="form-header">
            <p class="help-block text-center"><strong></strong></p>
            <img src="img/logo7.jpg" class="img-responsive">
        </div>
        <form id="id-form-login" class="form-signin">
            <input type="hidden" name="action" value="login">
            <input type="hidden" id="id-iplocal" name="iplocal">
            <input type="hidden" id="id-bso" name="bso">

            <span id="reauth-email" class="reauth-email"></span>
            <div class="text-center" style="min-height: 2rem">
                <div id="id-mensaje" style="display: none">
                </div>
            </div>
            <input class="form-control" placeholder="Cédula de indentidad" name="cuenta" type="text" autocomplete="off"
                   autofocus
                   required>
            <input class="form-control" placeholder="Contraseña" name="password" type="password" required>
            <button class="btn btn-block bt-login" id="id-btn-login">
                <i class="glyphicon glyphicon-log-in"></i>
                Iniciar sesión
            </button>
        </form>
        <div class="form-footer">
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <i class="glyphicon glyphicon-lock"></i>
                    <a href="forget_password.php"> ¿Olvidó su contraseña? </a>
                </div>
            </div>
            <div class="g-recaptcha" data-sitekey="6LeRE7YUAAAAAFKgc8fuOk6muxkRj44pSQrkXibs"></div>
        </div>
    </div><!-- /card-container -->
</div><!-- /container fluid-->
<script src="js/jquery-3.6.0.min.js"></script>

<script src="js/iplocal.js"></script>
<script src="js/clienteinfo.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>

<script>
    var iplocal;



    $(function () {



        $('#id-form-login').on({
            submit: function (e) {
                e.preventDefault();

                var frmData = new FormData($(this)[0]);
                frmData.append('iplocal', iplocal);
                frmData.append('navegador', jscd.browser + ' ' + jscd.browserMajorVersion);
                frmData.append('so', jscd.os + ' ' + jscd.osVersion);
                frmData.append('screensize', jscd.screen);

                $('#id-btn-login').attr('disabled', true);
                $('#id-mensaje').removeClass().fadeOut();

                $.ajax({
                    url: 'ajax/verificalogin.php',
                    data: frmData,
                    method: 'POST',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                }).done(function (data) {
                    console.log(data);  
                    if (data.resp == 1) {
                        window.location = 'inicio.php';
                        return false;
                    } else {
                        $('#id-btn-login').attr('disabled', false);
                        $('#id-mensaje').fadeIn().addClass('alert alert-danger');
                        $('#id-mensaje').html(data.error);
                    }

                }).fail(function (jqXHR, textStatus) {
                    $('#id-mensaje').fadeIn().addClass('alert alert-danger');
                    $('#id-mensaje').html('Error:Problemas de conexion con el servidor ' + textStatus + jqXHR + URL);
                    $('#id-btn-login').attr('disabled', false);
                });
            }
        });

        getUserIP(function (ip) {
            iplocal = ip;
            console.log(iplocal);
        });
        clienteinfo(window);
    });

</script>
</body>
</html>