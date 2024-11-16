<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workflow System</title>
</head>
<body>
<?= ShowHeader() ?>
    <div>
        <div class="col-md-12">
            <div class="col-md-12 mb-3 d-flex justify-content-between align-items-center">
                <h3>Update User</h3>
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
                <input type="text" class="form-control" id="UserName" disabled>
            </div>
            <div class="col-md-4 mb-3">
                <label>Email address:</label>
                <input type="text" class="form-control" id="UserEmail">
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
                <button class="btn btn-primary mt-3" id="btnSubmit" onclick="updateData()">Update <span class="fas fa-pencil"></span></button>
            </div>
        </div>
    </div>
<?= ShowFooter() ?>
</body>
</html>
<script>
    var host_url = '<?php echo host_url(); ?>';
    var UserRecord = <?= json_encode($UserRecord); ?>;

    $(document).ready(function() {
        $('#FirstName').val(UserRecord[0].first_name);
        $('#MiddleName').val(UserRecord[0].middle_name);
        $('#LastName').val(UserRecord[0].last_name);
        $('#UserName').val(UserRecord[0].user_name);
        $('#UserEmail').val(UserRecord[0].user_email);
        $('#UserRole').val(UserRecord[0].user_role);
    });

    function updateData() {
        var data = {
            FirstName: $('#FirstName').val(),
            MiddleName: $('#MiddleName').val(),
            LastName: $('#LastName').val(),
            UserEmail: $('#UserEmail').val(),
            UserRole: $('#UserRole').val(),
            UserName: UserRecord[0].user_name,
            UserNo: UserRecord[0].RecID
        };

        console.log('Data: ', data);
        axios.post(host_url+'Home/UpdateRecord', data).then(function(res) {
            Swal.fire({
                icon: 'success',
                title: 'Successful!',
                text: 'Your data has been saved successfully.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        window.location.reload()
                    }, 1500)
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

    $('#BtnListOfUsers').click(function() {
        var ShowListOfUsers = host_url + 'Home/ShowListOfUsers';
        window.location.href = ShowListOfUsers;
    });
</script>