<?php

/**
 * Description of Principal
 * Classe contém fucionalidades genéricas do cliente API
 *
 * @author tiagoc
 */
class GeraHtml
{
    public static function cabecalho($nomeRecurso)
    {
        $html = '<!DOCTYPE html>' . PHP_EOL
            . '<html lang="en">' . PHP_EOL
            . '<head>' . PHP_EOL
            . '<meta charset="UTF-8">' . PHP_EOL
            . '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . PHP_EOL
            . '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">' . PHP_EOL
            . '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">' . PHP_EOL
            . '<title>' . strtoupper($nomeRecurso) . ' Adm</title>' . PHP_EOL
            . '</head>';
        return $html;
    }

    public static function opcoes($btns)
    {
        $html = '<div class="col-xs-12">'
            . '<a class="btn btn-dark" href="index.php"> Inicio</a>';
        foreach ($btns as $value) {
            $html = $html . '<button id="' . $value['id'] . '" class="btn btn-' . $value['cor'] . '">' . $value['nome'] . '</button>';
        }
        $html = $html     . '</div>';
        return $html;
    }

    public static function formEdit($inputs, $btns, $nomeRecurso)
    {
        $var = new GeraHtml;
        $html = '<div id="' . $nomeRecurso . '-editar" style="display: none;">' . PHP_EOL;
        $inputs = $var->inputs($inputs);
        $botoes = '';
        foreach ($btns as $value) {
            $botoes = $botoes . '<button id="' . $value['id'] . '" class="btn btn-' . $value['cor'] . '">' . $value['nome'] . '</button>';
        }            
        $html = $html . $inputs . $botoes;
        $html = $html . '</div>';
        return $html;
    }
    private function inputs($inputs)
    {
        $inp_codigo = "";
        $inp_geral = "";
        $inp_datas = "";
        //Input Codigo        
        $inp_codigo = '<div class="form-group">' . PHP_EOL
            . '<label for="codigo">Codigo:</label>' . PHP_EOL
            . '<input type="text" class="form-control" readonly id="codigo">' . PHP_EOL
            . '</div>' . PHP_EOL;
        // Inputs Gerais
        foreach ($inputs as $key => $value) {
            $inp_geral = $inp_geral . $this->criaInput($value);
        }
        // Inputs Datas        
        $inp_datas = '<div class="form-group">'
            . '<label for="dataCriacao">Data Criação:</label>'
            . '<input type="text" class="form-control" readonly id="dataCriacao">'
            . '</div>'
            . '<div class="form-group">'
            . '<label for="dataAtu">Data Atualização:</label>'
            . '<input type="text" class="form-control" readonly id="dataAtu">'
            . '</div>';

        return $inp_codigo . $inp_geral . $inp_datas;
    }
    private function criaInput($dados)
    {
        if ($dados['tipo_input'] == 'text') {
            $input = '<div class="form-group">'
                . '<label for="' . $dados['nome'] . '">' . $dados['descricao'] . ':</label>'
                . '<input type="text" class="form-control" id="' . $dados['nome'] . '">'
                . '</div>';
        } elseif ($dados['tipo_input'] == 'select') {

            $input = '<div class="form-group">'  . PHP_EOL
                . '<label for="' . $dados['nome'] . '">' . $dados['descricao'] . ':</label>' . PHP_EOL
                . '<select class="form-control" id="' . $dados['nome'] . '" name="' . $dados['nome'] . '" form="form">' . PHP_EOL
                . '</select>' . PHP_EOL
                . '</div>';
        } else {
            $input = "Tipo Input Não cadastrado: " . $dados['tipo_input'];
        }
        return $input;
    }
    public static function criaLista($inputs, $nomeRecurso)
    {
        $html = '<div id="' . $nomeRecurso . '-listar" class="col-xs-12">' . PHP_EOL
            . '<div class="d-flex flex-row-reverse"> <div class="p-2"> <input class="form-control" id="filtro" type="text" placeholder="Busca.."> </div></div>' . PHP_EOL
            . '<table id="lista" class="table table-striped table-condensed">' . PHP_EOL
            . '<thead>' . PHP_EOL
            . '<tr>' . PHP_EOL;
        foreach ($inputs as $value) {
            if ($value['table']) {
                $html = $html . '<th>' . $value['descricao'] . '</th>' . PHP_EOL;
            }
        }
        $html = $html
            . '<th>Manut</th>' . PHP_EOL
            . '</tr>' . PHP_EOL
            . '</thead>' . PHP_EOL
            . '<tbody></tbody>' . PHP_EOL
            . '</table>' . PHP_EOL
            . '</div>' . PHP_EOL;

        return $html;
    }
}
