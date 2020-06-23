<?php

namespace Controllers;

class AdminController
{
    public function login()
    {
        $data = ["admin" => "error"] ;
        if ($_POST['login'] == 'admin' && $_POST['pass'] == '123'){
            session_start();
            $_SESSION['admin'] = true;
            $data = ['admin' => 'success'];
        }
        echo json_encode($data);
    }
    
    public function logout()
    {
        session_start();
        session_destroy();
        
        header("Location: http://" . $_SERVER["HTTP_HOST"]);
    }
}