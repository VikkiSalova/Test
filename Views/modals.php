<div class="modal fade" id="addTaskModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add task</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form action="http://vikkitodo.zzz.com.ua/task/add" method="post" id="addTaskForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user_name"> Name: </label>
                            <input type="text" class="form-control" name="user_name" id="user_name" required>
                        </div>
                        <div class="form-group">
                            <label for="user_email"> E-mail: </label>
                            <input type="email" class="form-control" name="user_email" id="user_email" required>
                        </div>
                        <div class="form-group">
                            <label for="description"> Description: </label>
                            <input type="text" class="form-control" name="description" id="description" required>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="addTask" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="login"> Login: </label>
                            <input type="text" class="form-control" name="login" id="login" required>
                        </div>
                        <div class="form-group">
                            <label for="pass"> Password: </label>
                            <input type="password" class="form-control" name="pass" id="pass" required>
                        </div>
                    </div>   
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="login-sumbit" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        
<div class="modal fade" id="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit description</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form action="http://vikkitodo.zzz.com.ua/task/edit" method="post" id="editForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="newDescription"> Description: </label>
                            <input type="text" class="form-control" name="newDescription" id="newDescription" required>
                        </div>
                        <input type="hidden" id="edit-id" name="id">
                    </div>   
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="edit-sumbit" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>