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
                <h3>Module1</h3>
                <button class="btn btn-danger" id="BtnListOfUsers">Back</button>
            </div>
            <div class="col-md-12 mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label>First name:</label>
                        <input type="text" class="form-control" id="FirstName">
                    </div>
                    <div class="col-md-4">
                        <label>Middle name:</label>
                        <input type="text" class="form-control" id="MiddleName">
                    </div>
                    <div class="col-md-4">
                        <label>Last name:</label>
                        <input type="text" class="form-control" id="LastName">
                    </div>
                 
                </div>
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
                <label>User role:</label>
                <select class="form-control" id="UserRole">
                    <option value="">Select an Option</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-primary mt-3" id="btnSubmit" onclick="saveData()">Submit <span class="fas fa-save"></span></button>
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
        console.log(UserRecord);
        $('#UserName').val(UserRecord[0].user_name);
        $('#UserEmail').val(UserRecord[0].user_email);
        $('#UserRole').val(UserRecord[0].user_role);
    });

    $('#BtnListOfUsers').click(function() {
        var ShowListOfUsers = host_url + 'Home/ShowListOfUsers';
        window.location.href = ShowListOfUsers;
    });
</script>