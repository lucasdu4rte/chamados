<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Chamados WebTicket</title>
    
    <style>
        a[href="#top"]{
            padding:10px;
            position:fixed;
            top: 88%;
            right: 25px;
            display: none;
            font-size: 50px;
            color: #004d99;
        }
        a[href="#top"]:hover{
            text-decoration:none;
            color: #004d99;
        }
        a[href="#top"]:active{
            text-decoration:none;
            color: #004d99;
        }
        
        
        
    /**@import url(http://fonts.googleapis.com/css?family=Roboto);**/

    /****** LOGIN MODAL ******/
    .loginmodal-container {
        margin-top: 30px;
        padding: 30px;
        max-width: 350px;
        width: 100% !important;
        background-color: #F7F7F7;
        margin: 0 auto;
        border-radius: 5px;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        font-family: sans-serif;
    }

    .loginmodal-container h1 {
      text-align: center;
      font-size: 1.8em;
      font-family: sans-serif;
    }

    .loginmodal-container input[type=submit] {
      width: 100%;
      display: block;
      margin-bottom: 10px;
      position: relative;
    }

    .loginmodal-container input[type=text], input[type=password] {
      height: 44px;
      font-size: 16px;
      width: 100%;
      margin-bottom: 10px;
      -webkit-appearance: none;
      background: #fff;
      border: 1px solid #d9d9d9;
      border-top: 1px solid #c0c0c0;
      /* border-radius: 2px; */
      padding: 0 8px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
    }

    .loginmodal-container input[type=text]:hover, input[type=password]:hover {
      border: 1px solid #b9b9b9;
      border-top: 1px solid #a0a0a0;
      -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
      -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
      box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    }

    .loginmodal {
      text-align: center;
      font-size: 14px;
      font-family: 'Arial', sans-serif;
      font-weight: 700;
      height: 36px;
      padding: 0 8px;
    /* border-radius: 3px; */
    /* -webkit-user-select: none;
      user-select: none; */
    }

    .loginmodal-submit {
      /* border: 1px solid #3079ed; */
      border: 0px;
      color: #fff;
      text-shadow: 0 1px rgba(0,0,0,0.1); 
      background-color: #4d90fe;
      padding: 17px 0px;
      font-family: roboto;
      font-size: 14px;
      /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
    }

    .loginmodal-submit:hover {
      /* border: 1px solid #2f5bb7; */
      border: 0px;
      text-shadow: 0 1px rgba(0,0,0,0.3);
      background-color: #357ae8;
      /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
    }

    .loginmodal-container a {
      text-decoration: none;
      color: #666;
      font-weight: 400;
      text-align: center;
      display: inline-block;
      opacity: 0.6;
      transition: opacity ease 0.5s;
    } 

    .login-help{
      font-size: 12px;
    }
    </style>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebTicket</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> Painel <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configs</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper" style="margin-top: 35px;">
        <div class="container-fluid">
            <div class="row">
                <div class="loginmodal-container">
                    <h1>Entrar com sua conta</h1><br>
                    <form method="post" action="login_vai.php">
                        <input class="form-control" type="text" name="email" id="email" placeholder="E-mail">
                        <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha">
                        <input type="submit" class="login loginmodal-submit" value="Entrar">
                    </form>

                    <div class="login-help">
                        <a href="#">Registrar</a> - <a href="#">Esqueceu a senha?</a>
                     </div>
                </div>
            </div>

            <a href="#top" class="fa fa-arrow-circle-up" aria-hidden="true"></a>
            <!-- ... Your content goes here ... -->
            
            <!--Rodapé-->
            <div class="" style="padding-top: 30px">
                <center>© Copyright 2017. Todos os direitos reservados.</center>
            </div>
        </div>
    </div>

</div>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>
    
<script>
$(document).ready(function(){
    
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('a[href="#top"]').fadeIn();
        } else {
            $('a[href="#top"]').fadeOut();
        }
    });

    $('a[href="#top"]').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
});    
</script>

</body>
</html>
