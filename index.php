<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Registro Manutenção</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            position: relative;
        }

        .divs_registros {
            padding-top: 70px;
            padding-bottom: 20px;
            border-bottom: 2px solid black;
        }

        .divs_area_responsavel {
            padding-bottom: 20px;
            border-bottom: 2px solid blue;
        }

        .cetraliza_nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login_nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <ul class="navbar-nav navbar-left">
            <li class="nav-item cetraliza_nav">
                <a class="nav-link" href="index.php">
                    <img src="/img/seduc-porvir-dark.png" />
                </a>
            </li>
            <li class="nav-item cetraliza_nav">
                <a class="nav-link" href="registro.php">Novo Registro</a>
            </li>   
            <li class="nav-item login_nav">
                <a class="nav-link" href="registro.php">Novo Registro</a>
            </li>            
        </ul>
        
    </nav>
</body>

</html>