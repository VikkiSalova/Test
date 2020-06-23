$(document).ready(function () {
    $('#table').DataTable({
        "order": [],
        "searching": false,
        "pageLength": 3,
        "lengthChange": false,
        "columnDefs": [{
            orderable: false,
            targets: 2
        }]
    });
    $('.dataTables_length').addClass('bs-select');
    
    var path = 'http://' + $(location).attr('hostname');
    
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        
        $.ajax({
            url: path + '/admin/login',
            method: 'post',
            data:  $('#loginForm').serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.admin == 'error'){
                     $(".modal-body").prepend("<span class='danger'>Incorrect login or password</span>");
                } else if (data.admin == 'success'){
                    $(location).attr('href',path);
                }
            }
        });     
    });
    
    $('#loginBtn').on('click', function (e) {
        $('.modal-body .danger').remove();
        $('#loginForm').trigger("reset");
    });
    
    $(document).on('click', '#editPencil', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var text = $(this).siblings('.description').html();
        debugger;
        $('#edit-id').val(id);
        $('#newDescription').val(text);
    });
});