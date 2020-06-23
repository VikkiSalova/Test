<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test beejee</title>

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous" ></script>
        <script src="./main.js" defer></script>
      
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" /> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="./main.css" rel="stylesheet">
    </head>
    <body>
        <?php
        require_once('modals.php');
        $admin = $_SESSION['admin'] ?? false;
        if ($admin){?>
            <a class="btn btn-outline-dark" href="http://vikkitodo.zzz.com.ua/admin/logout" role="button">Logout</a>
        <?php } else {?>
            <a class="btn btn-outline-dark" href="#" role="button" id="addTask" data-toggle="modal" data-target="#addTaskModal">New task</a>
            <a class="btn btn-outline-dark" href="#" role="button" id="loginBtn" data-toggle="modal" data-target="#loginModal">Login</a>
        <?php } 
        if (isset($_SESSION['adding']) && $_SESSION['adding'] == 'success'):?>
            <div class="alert alert-success alert-arrow d-flex rounded p-0" role="alert">
                <div class="alert-icon d-flex justify-content-center align-items-center text-white flex-grow-0 flex-shrink-0">
                    <i class="fa fa-check"></i>
                </div>
                <div class="alert-message d-flex align-items-center py-2 pl-4 pr-3">
                    Your task successfully added.
                </div>
                <a href="#" class="close d-flex ml-auto justify-content-center align-items-center px-3" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        <?php unset($_SESSION['adding']);
            elseif($_SESSION['adding'] == 'error'): ?>
            <div class="alert alert-arrow alert-danger d-flex rounded p-0" role="alert">
                <div class="alert-icon d-flex justify-content-center align-items-center text-white flex-grow-0 flex-shrink-0">
                    <i class="fa fa-ban"></i>
                </div>
                <div class="alert-message d-flex align-items-center py-2 pl-4 pr-3">
                    Your task not added.
                </div>
                <a href="#" class="close d-flex ml-auto justify-content-center align-items-center px-3" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        <?php unset($_SESSION['adding']);
                endif; 
                if (isset($_SESSION['changing']) && $_SESSION['changing'] == 'error'):?>
                <div class="alert alert-arrow alert-danger d-flex rounded p-0" role="alert">
                    <div class="alert-icon d-flex justify-content-center align-items-center text-white flex-grow-0 flex-shrink-0">
                        <i class="fa fa-ban"></i>
                    </div>
                    <div class="alert-message d-flex align-items-center py-2 pl-4 pr-3">
                        You can't do this, please log in.
                    </div>
                    <a href="#" class="close d-flex ml-auto justify-content-center align-items-center px-3" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
        <?php unset($_SESSION['changing']);
            endif; ?>
        <h2>Tasks</h2>

        <div class="table-block">
               <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="th-sm">Name</th>
                      <th class="th-sm">E-mail</th>
                      <th class="th-sm">Description</th>
                      <th class="th-sm">Status</th>
                    </tr>
                  </thead>
                  <tbody>
           <?php foreach ($data as $item): ?>
                    <tr>
                      <td><?= $item['user_name']; ?></td>
                      <td><?= $item['user_email']; ?></td>
                        <td><span class='description'><?= $item['description']; ?></span>
                        <?php if($item['admin_edit']): ?>
                        <span class='edit'>(Edited by admin)</span>
                      <?php endif; ?>
                      <?php if($admin): ?>
                        <a href="#" id="editPencil" data-toggle="modal" data-id="<?= $item['id']; ?>" data-target="#editModal">
                            <i class="fa fa-pencil"></i>
                        </a>
                      <?php endif; ?></td>
                      <td><?= ($item['status'] ? "Completed" : "Not completed"); ?>
                      <?php if($admin): ?>
                      <a class="btn btn-outline-dark" href="http://vikkitodo.zzz.com.ua/task/changeStatus/?id=<?= $item['id']; ?>" role="button">Change status</a>
                      <?php endif; ?>
                      </td>
                    </tr> 
             <?php endforeach;?>
                </tbody>
            </table> 
        </div>
    </body>
</html>