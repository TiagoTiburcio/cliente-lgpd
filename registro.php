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
        .nav_principal{
            padding-bottom: 20px;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <img src="/img/seduc-porvir-dark.png" />
                </a>
            </li>
            <li class="nav-item cetraliza_nav">
                <a class="nav-link" href="#coleta">Coleta</a>
            </li>
            <li class="nav-item cetraliza_nav">
                <a class="nav-link" href="#processamento">Processamento</a>
            </li>
            <li class="nav-item cetraliza_nav">
                <a class="nav-link" href="#compartilhamento">Compartilhamento</a>
            </li>
            <li class="nav-item cetraliza_nav">
                <a class="nav-link" href="#seguranca">Segurança</a>
            </li>
            <li class="nav-item cetraliza_nav">
                <a class="nav-link" href="#descarte">Descarte</a>
            </li>
            <li class="nav-item cetraliza_nav">
                <a class="nav-link" href="#outros">Outros</a>
            </li>
            <li class="nav-item cetraliza_nav">
                <button type="button" id="btn-coleta-save" class="btn btn-success">SalvarRegistro</button>
            </li>
        </ul>
    </nav>
    <div class="div_principal">
        <div id="coleta" class="container-fluid divs_registros">
            <h1>Coleta</h1>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" class="custom-select">
                    <option selected>Selecione Categoria</option>
                    <option value="1">Processo</option>
                    <option value="2">Sistemas</option>
                    <option value="3">Outros</option>
                </select>
            </div>

            <div class="form-group">
                <label for="evento">Processo/Atividade/Evento:</label>
                <select name="evento" class="custom-select">
                    <option selected>Selecione Evento</option>
                    <option value="1">Processo1</option>
                    <option value="2">Processo2</option>
                    <option value="3">Processo3</option>
                    <option value="4">Outros</option>
                </select>
            </div>

            <div class="form-group divs_area_responsavel">
                <label for="area_responsavel">Area Responsavel:</label>
                <select name="area_responsavel" class="custom-select">
                    <option selected>Selecione Area Responsavel</option>
                    <option value="1">Processo1</option>
                    <option value="2">Processo2</option>
                    <option value="3">Processo3</option>
                    <option value="4">Outros</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dados">Dados</label>
                <select multiple class="form-control" id="dados">
                    <option value="1">Area 1</option>
                    <option value="2">Area 2</option>
                    <option value="3">Area 3</option>
                    <option value="4">Outros</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tipo_dados">Tipo Dados:</label>
                <select name="tipo_dados" class="custom-select">
                    <option selected>Selecione Tipo Dados</option>
                    <option value="1">Tipo Dados 1</option>
                    <option value="2">Tipo Dados 2</option>
                    <option value="3">Tipo Dados 3</option>
                    <option value="4">Outros</option>
                </select>
            </div>

            <div class="form-group">
                <label for="relevancia">Relevância:</label>
                <select name="relevancia" class="custom-select">
                    <option selected>Selecione Relevância</option>
                    <option value="1">Relevância 1</option>
                    <option value="2">Relevância 2</option>
                    <option value="3">Relevância 3</option>
                    <option value="4">Outros</option>
                </select>
            </div>

            <div class="form-group">
                <label for="segmentos">Segmentos</label>
                <select multiple class="form-control" id="segmentos">
                    <option value="1">Segmentos 1</option>
                    <option value="2">Segmentos 2</option>
                    <option value="3">Segmentos 3</option>
                    <option value="4">Outros</option>
                </select>
            </div>

            <div class="form-group">
                <label for="titular_dados">Titular Dados:</label>
                <select multiple class="form-control" id="titular_dados">
                    <option value="1">Titular Dados 1</option>
                    <option value="2">Titular Dados 2</option>
                    <option value="3">Titular Dados 3</option>
                    <option value="4">Outros</option>
                </select>
            </div>
            <div class="form-group">
                <label for="local_armazenamento">Onde os dados são armazenados?</label>
                <select multiple class="form-control" id="local_armazenamento">
                    <option value="1">local_armazenamento 1</option>
                    <option value="2">local_armazenamento 2</option>
                    <option value="3">local_armazenamento 3</option>
                    <option value="4">Outros</option>
                </select>
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="consentimento">
                    <label class="custom-control-label" for="consentimento">Existe Consentimento? </label>
                </div>
            </div>
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <button type="button" id="btn-coleta-ajuda" class="btn btn-info">Ajuda Coleta?</button>
                </div>
            </div>
        </div>
        <div id="processamento" class="container-fluid divs_registros">
            <h1>Processamento</h1>
            <div class="form-group">
                <label for="finalidade_coleta_dados">Finalidade da coleta de dados</label>
                <textarea class="form-control" id="finalidade_coleta_dados" rows="5"></textarea>
            </div>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="base_legal_aplicada">
                    <label class="custom-control-label" for="base_legal_aplicada">Existe base legal aplicada? </label>
                </div>
            </div>
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <button type="button" id="btn-processamento-ajuda" class="btn btn-info">Ajuda Processamento ?</button>
                </div>
            </div>
        </div>
        <div id="compartilhamento" class="container-fluid divs_registros">
            <h1>Compartilhamento</h1>
            <p class="divs_area_responsavel">Marque as opções abaixo somente se elas forem aplicadas a esta situação de coleta de dados.</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="compartilha_dados" value="true">
                <label class="form-check-label" for="compartilha_dados">Há Transferência de Dados</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="compartilha_inten_dados" value="true">
                <label class="form-check-label" for="compartilha_inten_dados">Há Transferência Internacional de Dados</label>
            </div>

            <div class="form-group">
                <label for="parceiros">Parceiros:</label>
                <input type="text" class="form-control" id="parceiros">
            </div>

            <div class="form-group">
                <label for="meio_compartilhamento">Meio Compartilhamento</label>
                <select multiple class="form-control" id="meio_compartilhamento">
                    <option value="1">meio 1</option>
                    <option value="2">meio 2</option>
                    <option value="3">meio 3</option>
                    <option value="4">Outros</option>
                </select>
            </div>
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <button type="button" id="btn-compartilhamento-ajuda" class="btn btn-info">Ajuda Compartilhamento?</button>
                </div>
            </div>
        </div>
        <div id="seguranca" class="container-fluid divs_registros">
            <h1>Segurança</h1>
            <div class="d-flex flex-row mb-3">
                <div class="p-2">
                    <button type="button" id="btn-novo-acesso" class="btn btn-primary">Novo Acesso</button>
                </div>
                <div class="p-2">
                    <button type="button" id="btn-salvar-acesso" class="btn btn-success">Salvar</button>
                </div>
                <div class="p-2">
                    <button type="button" id="btn-excluir-acesso" class="btn btn-danger">Excluir</button>
                </div>
                <div class="p-2">
                    <input type="text" class="form-control text-center" id="seguranca_acesso" readonly value="1">
                </div>
            </div>
            <div class="form-group">
                <label for="seguranca_acesso">Área/Função/Cargo:</label>
                <input type="text" class="form-control" id="seguranca_acesso" value="Estagiario">
            </div>
            <div class="form-group divs_area_responsavel">
                <label for="seguranca_nivel">Nível de Acesso</label>
                <select multiple class="form-control" id="seguranca_nivel">
                    <option selected value="1">Consultar</option>
                    <option value="2">Alterar</option>
                    <option value="3">Excluir</option>
                    <option selected value="4">Compartilhar</option>
                    <option value="5">Outros</option>
                </select>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Acesso</th>
                        <th scope="col">Nível</th>
                        <th scope="col">Manutencao</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Estagiario</td>
                        <td>Consultar; Compartilhar</td>
                        <td><button type="button" id="btn-editar" class="btn btn-warning">Editar</button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Administrador</td>
                        <td>Consultar; Alterar; Excluir; Compartilhar</td>
                        <td><button type="button" id="btn-editar" class="btn btn-warning">Editar</button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Padrão</td>
                        <td>Consultar; Alterar; Compartilhar</td>
                        <td><button type="button" id="btn-editar" class="btn btn-warning">Editar</button></td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <button type="button" id="btn-seguranca-ajuda" class="btn btn-info">Ajuda Segurança?</button>
                </div>
            </div>
        </div>
        <div id="descarte" class="container-fluid divs_registros">
            <h1>Descarte</h1>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="descarte_dados">
                    <label class="custom-control-label" for="descarte_dados">É realizado o descarte dos dados? </label>
                </div>
            </div>
            <div class="form-group">
                <label for="descarte_responsavel">Responsável:</label>
                <input type="text" class="form-control" id="descarte_responsavel">
            </div>
            <div class="form-group">
                <label for="descarte_motivo">Descrição / Motivo:</label>
                <textarea class="form-control" id="descarte_motivo" rows="6"></textarea>
            </div>
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <button type="button" id="btn-descarte-ajuda" class="btn btn-info">Ajuda Descarte?</button>
                </div>
            </div>
        </div>
        <div id="outros" class="container-fluid divs_registros">
            <h1>Outros</h1>
            <div class="form-group">
                <label for="observacao">Observação:</label>
                <textarea class="form-control" id="descarte_motivo" rows="10"></textarea>
            </div>
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                    <button type="button" id="btn-outros-ajuda" class="btn btn-info">Ajuda Outros?</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>