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
        <div class="col-md-12 main-content">
            <div class="col-md-12 page-main-header mb-3">
                <h3>Create User</h3>
                <button class="btn page-main-header-btn btn-danger" id="BtnListOfUsers">Back <span class="fas fa-arrow-left"></span></button>
            </div>
            <div class="col-md-12 page-main-content mb-3">
                <div class="col-md-4 mb-3 p-0">
                    <label>First name:</label>
                    <input type="text" class="form-control input-text" id="FirstName">
                </div>
                <div class="col-md-4 mb-3 p-0">
                    <label>Middle name:</label>
                    <input type="text" class="form-control input-text" id="MiddleName">
                </div>
                <div class="col-md-4 mb-3 p-0">
                    <label>Last name:</label>
                    <input type="text" class="form-control input-text" id="LastName">
                </div>
                <div class="col-md-4 mb-3 p-0">
                    <label>Username:</label>
                    <input type="text" class="form-control input-text" id="UserName">
                </div>
                <div class="col-md-4 mb-3 p-0">
                    <label>Email address:</label>
                    <input type="text" class="form-control input-text" id="UserEmail">
                </div>
                <div class="col-md-4 mb-3 p-0">
                    <label>Password:</label>
                    <input type="password" class="form-control input-text" id="UserPassword">
                </div>
                <div class="col-md-4 mb-3 p-0">
                    <label>User role:</label>
                    <select class="form-control" id="UserRole">
                        <option value="">Select an Option</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3 p-0">
                    <button class="btn page-main-content-btn btn-primary mt-3" id="btnSubmit">Submit <span class="fas fa-save"></span></button>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="CreateUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title">Identity Verification</label>
                <span class="modal-close" data-dismiss="modal">&times;</span>
            </div>
            <div class="modal-body">
                <label>Enter your password.</label>
                <input type="password" id="CreateUserPass" class="form-control input-text form-control-sm">
                <input type="hidden" id="user_key" class="form-control input-text form-control-sm" value="<?= session('session_password') ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-btn btn-success" id="BtnCreateUser">Confirm</button>
                <button type="button" class="modal-btn btn-danger" id="BtnCancel" data-dismiss="modal">Cancel</button>
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

    $('#BtnCreateUser').click(function() {
        if($('#CreateUserPass').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: 'Password is required!',
                confirmButtonText: 'OK'
            });
            return false;
        }
        
        if(CryptoJS.SHA1(CryptoJS.MD5($('#CreateUserPass').val()).toString()) != $('#user_key').val()) {
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: 'Invalid Password!',
                confirmButtonText: 'OK'
            });
            return false;
        }

        saveData();
    });

    $('#BtnListOfUsers').click(function() {
        var ShowListOfUsers = host_url + 'Home/ShowListOfUsers';
        window.location.href = ShowListOfUsers;
    });
</script>