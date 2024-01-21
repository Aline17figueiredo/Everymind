<?php


    $controller = new produtosCRUD();

    $action = (isset($_GET['a']) || isset($_POST['a'])) ? (isset($_POST['a']) ? $_POST['a'] : $_GET['a']) : 'selectAll';
    $message = isset($_GET['m']) ? $_GET['m'] : '';
    $status = !empty($_GET['s']) ? $_GET['s'] : '';

    if(!empty($message) && isset($_GET['s']))
    {
        $messages = [
            'edit' => ['editado','editar'],
            'delete' => ['deletado','deletar'],
            'update' => ['atualizado','atualizar'],
            'insert' => ['inserido','inserir']
        ];
        $controller->{$action}($messages[$message][0],$messages[$message][1],$status);
    }
    else if($action == "delete")
    {
        $id = $_GET['CodigoProduto'];
        $controller->{$action}($Produto);
    }
    else if($action == "selectAll")
    {
        $data = $_GET['selectAll'];
        $view = isset($_GET['v']) ? $_GET['v'] : 'produtoTela';
        if(empty($data))
        {
            $controller->selectAll();
        }
        else
        {
            $controller->{$action}($data,$view);
        }
    }
    else if($action == "update")
    {
        $controller->{$action}($_POST);
    }
    else if($action == "insert")
    {
        $controller->{$action}($_POST);
    }
    else
    {
        $controller->{$action}();
    }