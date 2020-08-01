<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Registro Manutenção</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">
            <img src="./img/seduc-porvir-dark.png" />
        </a>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-home" style="color: white;"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Novo Registro</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Manutenção Inclusão Opções
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Coleta - Categoria</a>
                        <a class="dropdown-item" href="#">Coleta - Categoria Eventos</a>
                        <a class="dropdown-item" href="#">Coleta - Area Responsavel</a>
                        <a class="dropdown-item" href="#">Coleta - Dados</a>
                        <a class="dropdown-item" href="#">Coleta - Tipo Dados</a>
                        <a class="dropdown-item" href="#">Coleta - Relevância</a>
                        <a class="dropdown-item" href="#">Coleta - Segmentos</a>
                        <a class="dropdown-item" href="#">Coleta - Titular Dados</a>
                        <a class="dropdown-item" href="#">Coleta - Local Armazenamento</a>
                        <a class="dropdown-item" href="#">Compartilhamento - Meio Compartilhamento</a>
                        <a class="dropdown-item" href="#">Segurança - Nível Acesso</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <li><i class="fa fa-user" style="color: white;"><?= ' Usuário Logado Sistema' ?></i></li>
                <li><a href="sairlogin.php" style="color: white;"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
            </form>
        </div>
    </nav>
    <div class="div_principal col-xs-12 container-fluid divs_registros" id="registros-listar">
        <div class="d-flex flex-row-reverse row">
            <div class="p-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" id="filtro">
                </div>
            </div>
            <table id="lista" class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>
                            Dados
                        </th>
                        <th>
                            Tipo
                        </th>
                        <th>
                            Área Responsável
                        </th>
                        <th>
                            Titular dos Dados
                        </th>
                        <th>
                            Usr. Ult. Atu.
                        </th>
                        <th>
                            Manut.
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            Área; CPF do Titular; E-mail; Nome; Telefone
                        </th>
                        <th>
                            Pessoais e Sensíveis
                        </th>
                        <th>
                            Gerência de Infraestrutura
                        </th>
                        <th>
                            Colaborador; Terceiros
                        </th>
                        <th>
                            tiagoc
                        </th>
                        <th>
                            <button class="btn btn-warning">Editar</button>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Área; CPF do Titular; E-mail; Nome; Telefone
                        </th>
                        <th>
                            Pessoais e Sensíveis
                        </th>
                        <th>
                            Gerência de Infraestrutura
                        </th>
                        <th>
                            Colaborador; Terceiros
                        </th>
                        <th>
                            tiagoc
                        </th>
                        <th>
                            <button class="btn btn-warning">Editar</button>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>