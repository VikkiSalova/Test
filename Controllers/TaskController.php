<?php

namespace Controllers;

use App\View;
use Models\Task;

/**
 * Главный контроллер приложения
 * 
 *
 */
class TaskController
{
    public function main()
    {
        $model = new Task();
        $data = $model->displayAll();
        
        View::render('main', [
            'data' => $data,
        ]);
    }
    
    public function add()
    {
        session_start();
        $_SESSION['adding'] = 'error';
        if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['description'])){
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $description = $_POST['description'];
            $model = new Task();
        
            $result = $model->save($user_name, $user_email, $description);
            
            if ($result){    
                $_SESSION['adding'] = 'success';
            } 
        }
        header("Location: http://" . $_SERVER["HTTP_HOST"]);
    }
    
    public function changeStatus()
    {
        session_start();
        $_SESSION['changing'] = 'error'; 
        if (isset($_GET['id']) && isset($_SESSION['admin'])){ 
            $model = new Task();
            $id = $_GET['id'];
            $status = $model->changeStatus($id);
            if($status){
                $_SESSION['changing'] = 'success';   
            }
        }
        header("Location: http://" . $_SERVER["HTTP_HOST"]);
    }
    
    public function edit()
    {
        session_start();
        $_SESSION['changing'] = 'error'; 
        if (isset($_POST['id']) && isset($_SESSION['admin']) && isset($_POST['newDescription'])){ 
            $model = new Task();
            $id = $_POST['id'];
            $status = $model->edit($id);
            if($status){
                $_SESSION['changing'] = 'success';   
            }
        }
        header("Location: http://" . $_SERVER["HTTP_HOST"]);
    }
}