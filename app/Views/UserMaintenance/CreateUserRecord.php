<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workflow System</title>
    <?= css_container() ?>
</head>
<body>
<?= ShowHeader() ?>
<main class="page-main">
    <div>
        <div class="col-md-12">
            <div class="col-md-12 mb-3 d-flex justify-content-between align-items-center">
                <h3>Create User</h3>
                <button class="btn btn-danger" id="BtnListOfUsers">Back <span class="fas fa-arrow-left"></span></button>
            </div>
            <div class="col-md-4 mb-3">
                <label>First name:</label>
                <input type="text" class="form-control" id="FirstName">
            </div>
            <div class="col-md-4 mb-3">
                <label>Middle name:</label>
                <input type="text" class="form-control" id="MiddleName">
            </div>
            <div class="col-md-4 mb-3">
                <label>Last name:</label>
                <input type="text" class="form-control" id="LastName">
            </div>
            <div class="col-md-4 mb-3">
                <label>Username:</label>
                <input type="text" class="form-control" id="UserName">
            </div>
            <div class="col-md-4 mb-3">
                <label>Email address:</label>
                <input type="text" class="form-control" id="UserEmail">
            </div>
            <div class="col-md-4 mb-3">
                <label>Password:</label>
                <input type="password" class="form-control" id="UserPassword">
            </div>
            <div class="col-md-4 mb-3">
                <label>User role:</label>
                <select class="form-control" id="UserRole">
                    <option value="">Select an Option</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-primary mt-3" id="btnSubmit">Submit <span class="fas fa-save"></span></button>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="CreateUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title">Identity Verification</label>
                <span class="BtnClose" data-dismiss="modal">&times;</span>
            </div>
            <div class="modal-body">
                <label>Enter your password.</label>
                <input type="password" id="CreateUserPass" class="form-control form-control-sm">
            </div>
            <div class="modal-footer">
                <button type="button" class="BtnGreen" id="BtnCreateUser">Confirm</button>
                <button type="button" class="BtnRed" id="BtnCancel" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?= ShowFooter() ?>
</body>
</html>
<script>
    var host_url = '<?php echo host_url(); ?>';

    $(document).ready(function() {
        GetLatestUserCount();
    });

    function GetLatestUserCount() {
        axios.get(host_url + 'Home/GetLatestUserCount').then(function(res) {
            let counter = parseInt(res.data.user_counter);
            counter++;
            let lastUsername = 10000 + counter;
            const username = 'WF-' + lastUsername;
            $("#UserName").val(username);    
        })
        .catch(function(error) {
            console.error('Error fetching user count:', error);
        });
    }

    function saveData() {
        var data = {
            FirstName: $('#FirstName').val(),
            MiddleName: $('#MiddleName').val(),
            LastName: $('#LastName').val(),
            UserName: $('#UserName').val(),
            UserEmail: $('#UserEmail').val(),
            UserPassword: $('#UserPassword').val(),
            UserRole: $('#UserRole').val()
        };

        axios.post(host_url+'Home/SaveRecord', data).then(function(res) {
            Swal.fire({
                icon: 'success',
                title: 'Successful!',
                text: 'Your data has been saved successfully.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        var ShowListOfUsers = host_url + 'Home/ShowListOfUsers';
                        window.location.href = ShowListOfUsers;
                    }, 1000)
                }
            });
        }).catch(function(error) {
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: error.response?.data?.error || 'An error occurred while saving data.',
                confirmButtonText: 'OK'
            });
        });
    }

    $('#btnSubmit').click(function() {
        $('#btnSubmit').attr({
            'data-toggle': 'modal',
            'data-target': '#CreateUserModal'
        });
    });

    $('#BtnListOfUsers').click(function() {
        var ShowListOfUsers = host_url + 'Home/ShowListOfUsers';
        window.location.href = ShowListOfUsers;
    });
</script>