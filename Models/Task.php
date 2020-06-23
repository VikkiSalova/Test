<?php

namespace Models;

class Task
{
    private $pdo;
    
    function __construct() {
        $dsn = 'mysql:host=127.0.0.1;dbname=beejee;';
        $this->$pdo = new \PDO($dsn, 'root', '');
        $this->$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    public function displayAll()
    { 
        $sql = 'SELECT * FROM tasks';
        return $this->$pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function save($user_name, $user_email, $description)
    { 
        $data = [
            'user_name' => htmlspecialchars($user_name),
            'user_email' => htmlspecialchars($user_email),
            'description' => htmlspecialchars($description),
        ];
        try {
            $sql = "INSERT INTO tasks (user_name, user_email, description) VALUES (:user_name, :user_email, :description)";
            $stmt= $this->$pdo->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }
    
    public function changeStatus($id)
    { 
        try {
            $stmt = $this->$pdo->prepare("SELECT status FROM tasks WHERE id=:id");
            $stmt->execute(['id' => $id]); 
            $status = $stmt->fetch();

            if ($status['status']) {
                $status['status'] = 0;
            } else {
                $status['status'] = 1;
            }
            $status = $status['status'];
            $sql = "UPDATE tasks SET status=? WHERE id=?";
            $this->$pdo->prepare($sql)->execute([$status, $id]);
            return true;
        } catch(PDOException $e) {
            return false;
        }    
    }
    
    public function edit($id)
    { 
        try {
            $admin_edit = 1;
            $description = htmlspecialchars($_POST['newDescription']);
            $sql = "UPDATE tasks SET description=?, admin_edit=? WHERE id=?";
            $this->$pdo->prepare($sql)->execute([$description, $admin_edit, $id]);
            return true;
        } catch(PDOException $e) {
            return false;
        }      
    }
}