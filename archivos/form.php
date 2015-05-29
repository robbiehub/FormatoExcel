<?php $_POST[ 'estado']=0 ; if (isset($_POST[ 'g1'])) { require_once 'registraRecibo.php'; registra_arch(); $_POST[ 'estado']=1 ; } if (isset($_POST[ 'd1'])) { require_once 'datos_personas.php'; genera_arch(); } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">

  <title>Personas</title>

  <!-- CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <!-- JS -->
  <!-- LIBS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  <!-- CUSTOM -->
  <script src="view.js"></script>

</head>


<body id="main_body">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Sistema</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menú <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Recibo</a>
              </li>
              <li><a href="#">Recibo por comprobar</a>
              </li>
              <li><a href="#">Viáticos</a>
              </li>
              <li><a href="#">Orden de servicio</a>
              </li>
              <li><a href="#">Comprobación de gasto</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <section class="row">
      <div class="col-lg-12">
        <legend>
          <h1>Personas</h1>
        </legend>
      </div>
      <form id="form_618778" class="appnitro" enctype="multipart/form-data" method="post" action="">
        <div class="col-lg-12">
          <div class="well bs-component">
            <div class="form-horizontal">
              <section class="row">
                <label class="col-lg-12">
                  <h3>Area para subir información al servidor:</h3>
                </label>
                <div class="col-lg-12">
                  <div class="fileUpload btn btn-default">
                    <input id="element_2" name="archivo1" class="element file" type="file" />
                  </div>
                  <input name="action2" type="hidden" value="upload2" />
                  <input id="guardar2" class="btn btn-primary" type="submit" name="g1" value="Enviar" />
                </div>
              </section>
              <legend></legend>
              <section class="row">
                <div class="col-lg-12">
                  <h3>Area para descarga de archivo:</h3>
                </div>
                <div class="col-lg-12">
                  <input type="hidden" name="form_id" value="618778" />
                  <input id="saveForm" class="btn btn-primary" type="submit" name="d1" value="Generar archivo" />
                  <input id="return8" class="btn btn-primary" type="submit" name="inicio8" value="Reiniciar" onClick="this.form.action='form.php';" />
                  <input id="returnC" class="btn btn-primary" type="submit" name="cerrarR" value="Cerrar" onClick="this.form.action='/form.php'" />
                </div>
              </section>
            </div>
          </div>
        </div>
        <div id="footer">
          <?php if ($_POST[ 'estado']==0 ) { ?>
          <P ALIGN=center>
            <FONT FACE="arial" SIZE=2 COLOR=blue> Inicio </FONT>
            <?php } if ($_POST[ 'estado']==1 ) { ?>
          </P>
          <P ALIGN=center>
            <FONT FACE="arial" SIZE=2 COLOR=blue>El archivo ha sido enviado satisfactoriamente</FONT>
            <?php } if ($_POST[ 'estado']==2 ) { ?>
          </P>
          <P ALIGN=center>
            <FONT FACE="arial" SIZE=2 COLOR=blue>Ha ocurrido un error al enviar el archivo</FONT>
            <?php } if ($_POST[ 'estado']==3 ) { ?>
          </P>
          <P ALIGN=center>
            <FONT FACE="arial" SIZE=2 COLOR=blue>Debe seleccionar un dato</FONT>
            <?php } if ($_POST[ 'estado']==6 ) { ?>
          </P>
          <P ALIGN=center>
            <FONT FACE="arial" SIZE=2 COLOR=blue>
                </FONT>
            <?php if($ciudad==1) echo 'Hermosillo'; ?>
            <a href="datos_personas.xls">Haz click para descargar el archivo! </a>
          </P>

          <?php } ?>
        </div>
      </form>
    </section>
  </div>
</body>

</html>