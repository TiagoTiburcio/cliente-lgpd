<?php

/**
 * Description of Principal
 * Classe contém fucionalidades genéricas do cliente API
 *
 * @author tiagoc
 */
class GeraJS
{
    private function selectDivPricipais($nomeRecurso)
    {
        $js = 'var divEditar = $("#' . $nomeRecurso . '-editar");'
            . 'var divListar = $("#' . $nomeRecurso . '-listar");';
        return $js;
    }

    public function btnAdd($nomeRecurso)
    {
        $js = 'var btn_add = $("#adicionar");' . PHP_EOL
            . 'btn_add.on("click", function() {' . PHP_EOL
            . $this->selectDivPricipais($nomeRecurso) . PHP_EOL
            . 'divEditar.toggle();' . PHP_EOL
            . 'divListar.toggle();' . PHP_EOL
            . 'if (divEditar.attr("style") == "display: none;") {' . PHP_EOL
            . 'carregaLista();' . PHP_EOL
            . '} else {' . PHP_EOL
            . 'montaEdit();' . PHP_EOL
            . '}' . PHP_EOL
            . '});' . PHP_EOL;
        return $js;
    }

    public function btnSave($nomeRecurso, $inputs)
    {
        $qtd = (count($inputs) - 1);
        $js = 'var btn_save = $("#salvar_' . $nomeRecurso . '");' . PHP_EOL
            . 'btn_save.on("click", function() {' . PHP_EOL
            . $this->selectDivPricipais($nomeRecurso) . PHP_EOL
            . $this->importaInputs($inputs) . PHP_EOL
            . $this->validaInputsVazios($inputs) . PHP_EOL
            . 'if (inp_codigo.val() == "") {' . PHP_EOL
            . 'salvar(' . $this->retornaValorInputs($inputs) . ');' . PHP_EOL
            . '} else {' . PHP_EOL
            . 'atualizar(inp_codigo.val(), ' . $this->retornaValorInputs($inputs) . ');' . PHP_EOL
            . '}' . PHP_EOL
            . 'divEditar.toggle();' . PHP_EOL
            . 'divListar.toggle();' . PHP_EOL
            . 'carregaLista();' . PHP_EOL
            . '}); ' . PHP_EOL;
        return $js;
    }

    private function retornaValorInputs($inputs)
    {
        $js = '';
        foreach ($inputs as $key => $value) {
            if ($value['tipo_input'] == 'text') {
                $js = $js . 'inp_' . $value['nome'] . '.val()';
            } elseif ($value['tipo_input'] == 'select') {
                $js = $js . 'inputSelecionado' . strtoupper($value['recurso']) . '()';
            }
            if (count($inputs) <> ($key + 1)) {
                $js = $js . ', ';
            }
        }
        return $js;
    }
    private function importaInputs($inputs)
    {
        $js = 'var inp_codigo = divEditar.find("#codigo");';
        foreach ($inputs as $value) {
            $js = $js . 'var inp_' . $value['nome'] . ' = divEditar.find("#' . $value['nome'] . '");';
        }
        return $js;
    }

    private function validaInputsVazios($inputs)
    {
        $js = '';
        foreach ($inputs as $value) {
            if ($value['tipo_input'] == 'text') {
                $js = $js . 'if (inp_' . $value['nome'] . '.val() == "") {'
                    . 'alert("Campo ' . $value['nome'] . ' não pode ser vazio!!!");'
                    . 'return;'
                    . '}';
            }
        }
        return $js;
    }

    public function btnDel($nomeRecurso)
    {
        $html = 'var btn_del = $("#delete_' . $nomeRecurso . '");'
            . 'btn_del.on("click", function() {'
            . $this->selectDivPricipais($nomeRecurso)
            . 'var inp_codigo = divEditar.find("#codigo");'
            . 'if (inp_codigo.val() != "") {'
            . 'deletar(inp_codigo.val());'
            . '}'
            . 'divEditar.toggle();'
            . 'divListar.toggle();'
            . 'carregaLista();'
            . '});';
        return $html;
    }

    private function addAjaxSalvar($inputs, $nomeRecurso)
    {
        $retorno = 'function salvar(';
        foreach ($inputs as $key => $value) {
            $retorno = $retorno . $value['nome'];
            if (count($inputs) <> ($key + 1)) {
                $retorno = $retorno . ', ';
            }
        }
        $retorno = $retorno . ') {'
            . ' var settings = {
                "async": true,
                "method": "POST",
                "url": "/api/index.php/infraestrutura/' . $nomeRecurso . '/",
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "Authorization": "Bearer " + token
                },
                "data": {';
        foreach ($inputs as $key => $value) {
            $retorno =  $retorno . '"' . $value['nome'] . '" : ' . $value['nome'];
            if (count($inputs) <> ($key + 1)) {
                $retorno = $retorno . ', ';
            }
        }
        $retorno =  $retorno . '} }' . PHP_EOL . ' var dados = $.ajax(settings, function(data) {
                return data;
            });
            return dados;
        }';
        return $retorno;
    }
    private function addAjaxAtualizar($inputs, $nomeRecurso)
    {
        $retorno = ' function atualizar(codigo, ';
        foreach ($inputs as $key => $value) {
            $retorno = $retorno . $value['nome'];
            if (count($inputs) <> ($key + 1)) {
                $retorno = $retorno . ', ';
            }
        }
        $retorno = $retorno . ') {'
            . 'var settings = {' . PHP_EOL
            . '"async": true,' . PHP_EOL
            . '"method": "POST",' . PHP_EOL
            . '"url": "/api/index.php/infraestrutura/' . $nomeRecurso . '/" + codigo + "/edit",' . PHP_EOL
            . '"headers": {' . PHP_EOL
            . '"Content-Type": "application/x-www-form-urlencoded",' . PHP_EOL
            . '"Authorization": "Bearer " + token ' . PHP_EOL
            . '},' . PHP_EOL
            . '"data": {';
        foreach ($inputs as $key => $value) {
            $retorno =  $retorno . '"' . $value['nome'] . '" : ' . $value['nome'];
            if (count($inputs) <> ($key + 1)) {
                $retorno = $retorno . ', ';
            }
        }
        $retorno =  $retorno . '} }' . PHP_EOL
            . 'var dados = $.ajax(settings, function(data) {' . PHP_EOL
            . 'return data;' . PHP_EOL
            . '});' . PHP_EOL
            . 'return dados;' . PHP_EOL
            . '}';
        return $retorno;
    }

    private function addAjaxDel($nomeRecurso)
    {
        $retorno =  'function deletar(codigo) {' . PHP_EOL
            . 'var settings = {' . PHP_EOL
            . '"async": true,' . PHP_EOL
            . '"method": "POST",' . PHP_EOL
            . '"url": "/api/index.php/infraestrutura/' . $nomeRecurso . '/" + codigo + "/delete",' . PHP_EOL
            . '"headers": {' . PHP_EOL
            . '"Content-Type": "application/x-www-form-urlencoded",' . PHP_EOL
            . '"Authorization": "Bearer " + token' . PHP_EOL
            . '}' . PHP_EOL
            . '}' . PHP_EOL
            . 'var dados = $.ajax(settings, function(data) {' . PHP_EOL
            . 'return data;' . PHP_EOL
            . '});' . PHP_EOL
            . 'return dados;' . PHP_EOL
            . '}';
        return $retorno;
    }

    private function addAjaxGetTodos()
    {
        $retorno = 'function getTodos(categoria) {
            var settings = {
                "async": true,
                "url": "/api/index.php/infraestrutura/" + categoria,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "Authorization": "Bearer " + token
                }
            }
            
        
            var dados = $.get(settings, function (data) {
                return data;
            });
            return dados;
        }';
        return $retorno;
    }

    public function addAjax($nomeRecurso, $inputs)
    {
        $retorno = $this->addAjaxSalvar($inputs, $nomeRecurso)
            . PHP_EOL . $this->addAjaxAtualizar($inputs, $nomeRecurso)
            . PHP_EOL . $this->addAjaxDel($nomeRecurso)
            . PHP_EOL . $this->addAjaxGetTodos();
        return $retorno;
    }

    public function montaEdit($nomeRecurso, $inputs)
    {
        $retorno = ' function montaEdit() {
            btn_add.text("Listar ' . strtoupper($nomeRecurso) . '");'
            . $this->selectDivPricipais($nomeRecurso)
            . 'divEditar.find("#codigo").val("");';
        foreach ($inputs as $value) {
            if ($value['tipo_input'] == 'text') {
                $retorno = $retorno . 'divEditar.find("#' . $value['nome'] . '").val("");' . PHP_EOL;
            } elseif ($value['tipo_input'] == 'select') {
                $retorno = $retorno . 'carrega' . strtoupper($value['recurso']) . '();' . PHP_EOL;
            }
        }
        $retorno = $retorno . 'divEditar.find("#dataCriacao").val("");
            divEditar.find("#dataAtu").val("");
        }';
        return $retorno;
    }

    public function carregaEdit($nomeRecurso, $inputs)
    {
        $retorno = 'function carregaEdit(codigo) {
            btn_add.text("Listar ' . strtoupper($nomeRecurso) . '");'
            . $this->selectDivPricipais($nomeRecurso)
            . 'divEditar.toggle();' . PHP_EOL
            . 'divListar.toggle();' . PHP_EOL
            . 'var dc = getTodos("' . $nomeRecurso . '/" + codigo);' . PHP_EOL
            . 'var inp_codigo = divEditar.find("#codigo");' . PHP_EOL;

        foreach ($inputs as $value) {
            $retorno = $retorno . 'var inp_' . $value['nome'] . ' = divEditar.find("#' . $value['nome'] . '");' . PHP_EOL;
        }

        $retorno = $retorno . 'var inp_dataCre = divEditar.find("#dataCriacao");' . PHP_EOL
            . 'var inp_dataAtu = divEditar.find("#dataAtu"); ' . PHP_EOL
            . 'dc.done(function(data) {' . PHP_EOL
            . 'inp_codigo.val(data.codigo);' . PHP_EOL;

        foreach ($inputs as $value) {
            if ($value['tipo_input'] == 'text') {
                $retorno = $retorno . 'inp_' . $value['nome'] . '.val(data.' . $value['nome'] . ');' . PHP_EOL;
            } elseif ($value['tipo_input'] == 'select') {
                $retorno = $retorno . 'carrega' . strtoupper($value['recurso']) . '(data.' . $value['nome'] . ');' . PHP_EOL;
            }
        }
        $retorno = $retorno . 'inp_dataCre.val(data.created_at)' . PHP_EOL
            . 'inp_dataAtu.val(data.updated_at);' . PHP_EOL
            . '});     }';
        return $retorno;
    }
    public function carregaLista($nomeRecurso, $inputs)
    {
        $retorno = ' function carregaLista() { ' . PHP_EOL
            . ' btn_add.text("Add ' . strtoupper($nomeRecurso) . '");' . PHP_EOL
            . ' var dcs = getTodos("' . $nomeRecurso . '");' . PHP_EOL
            . ' var tabela = $("#lista").find("tbody");' . PHP_EOL
            . ' tabela.empty();' . PHP_EOL
            . ' dcs.done(function(data) {' . PHP_EOL
            . ' for (let index = 0; index < data.length; index++) {' . PHP_EOL
            . ' const element = data[index];' . PHP_EOL
            . ' var linha = $("<tr>");';

        foreach ($inputs as $value) {
            if ($value['table']) {
                $retorno =  $retorno . 'var ' . $value['nome'] . ' = $("<td>").text(element.' . $value['nome'] . ');' . PHP_EOL;
            }
        }
        $retorno = $retorno . 'var link = $("<button>").text("Editar").attr("class", "btn btn-warning edit-dc").attr("id", element.codigo).attr("onClick", "carregaEdit(" + element.codigo + ");");' . PHP_EOL
            . 'var edit = $("<td>").append(link);' . PHP_EOL
            . 'linha';
        foreach ($inputs as $key => $value) {
            if ($value['table']) {
                $retorno =  $retorno . '.append(' . $value['nome'] . ')';
            }
        }
        $retorno = $retorno . '.append(edit);'
            . 'tabela.append(linha); }'
            . '} ); }';
        return $retorno;
    }

    public function filtraTable()
    {
        $retorno = '$(document).ready(function() {' . PHP_EOL
            . '$("#filtro").on("keyup", function() {' . PHP_EOL
            . 'var value = $(this).val().toLowerCase();' . PHP_EOL
            . '$("#lista tbody tr").filter(function() {' . PHP_EOL
            . '$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)' . PHP_EOL
            . '});' . PHP_EOL
            . '});' . PHP_EOL
            . '});';
        return $retorno;
    }

    public function inputSelect($recurso, $nome, $codigo_recurso, $nome_recurso)
    {
        $retorno = $this->inputSelectCarrega($recurso, $nome, $codigo_recurso, $nome_recurso);
        $retorno = $retorno . PHP_EOL . $this->inputSelectSelecionado($recurso, $nome);
        return $retorno;
    }

    private function inputSelectCarrega($recurso, $nome, $codigo_recurso, $nome_recurso)
    {
        $saida =  PHP_EOL . 'function carrega' . strtoupper($recurso) . '(codigo' . strtoupper($recurso) . ') {' . PHP_EOL
            . 'var recurso = getTodos("' . $recurso . '");' . PHP_EOL
            . 'var select = $("#' . $nome . '");' . PHP_EOL
            . '$("#' . $nome . ' option").remove();' . PHP_EOL
            . 'recurso.done(function(data) {' . PHP_EOL
            . 'for (let index = 0; index < data.length; index++) {' . PHP_EOL
            . 'const element = data[index];' . PHP_EOL
            . 'var linha = $("<option>");' . PHP_EOL
            . 'linha.val(element.' . $codigo_recurso . ');' . PHP_EOL
            . 'linha.text(element.' . $nome_recurso . ');' . PHP_EOL
            . 'if (codigo' . strtoupper($recurso) . ' == element.' . $codigo_recurso . ') {' . PHP_EOL
            . 'linha.attr("selected", "true");' . PHP_EOL
            . '}' . PHP_EOL . 'select.append(linha);' . PHP_EOL
            . '}' . PHP_EOL . '}); } ';
        return $saida;
    }
    private function inputSelectSelecionado($recurso, $nome)
    {
        $saida =  'function inputSelecionado' . strtoupper($recurso) . '() {' . PHP_EOL
            . 'var optionSelected = $("#' . $nome . ' option:selected");' . PHP_EOL
            . 'return optionSelected.val();' . PHP_EOL
            . '};';
        return $saida;
    }
}
