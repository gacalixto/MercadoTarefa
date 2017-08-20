<?php
 use Lib\Session;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= Lib\Config::get('site_nome') ?></title>

    <!-- Bootstrap -->
    <link href="<?= Lib\App::getRouter()->getResourceUrl('static/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= Lib\App::getRouter()->getResourceUrl('static/css/bootstrap-theme.min.css')?>" rel="stylesheet">
    <link href="<?= Lib\App::getRouter()->getResourceUrl('static/css/style.css')?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <body>
    <nav class="navbar navbar-custom navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= Lib\App::getRouter()->getUrl('','',[],'admin')?>"><?= Lib\Config::get('site_nome') ?>|Administrador</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <?php if(Session::get('usuario')):?>
          <ul class="nav navbar-nav">
              
              <li <?php if (Lib\App::getRouter()->getController()=='produto'){ ?> class="active"<?php }?>><a href="<?= Lib\App::getRouter()->getUrl('produto')?>">Produtos</a></li>
            <li <?php if (Lib\App::getRouter()->getController()=='funcionario'){ ?> class="active"<?php }?>><a href="<?= Lib\App::getRouter()->getUrl('funcionario')?>">Funcionários</a></li>
            <li <?php if (Lib\App::getRouter()->getController()=='pedido'){ ?> class="active"<?php }?>><a href="<?= Lib\App::getRouter()->getUrl('pedido')?>">Pedidos</a></li>
            <li><a href="<?= Lib\App::getRouter()->getUrl('funcionario','logout')?>">Logout</a></li>
          </ul>
            <?php endif;?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
      <div class="starter-template">
      <?php if (Session::hasFlash()):?>
          <div class="alert-info" role="alert">
              <?php Session::Flash();?>
              </div>
          <?php endif;?>
          <?= $data['content']?>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/admin.js"></script>
  </body>
</html>



