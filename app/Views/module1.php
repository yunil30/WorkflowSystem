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
            <div class="col-md-4 mb-3">
                <h3>Module1</h3>
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
                <label>Password:</label>
                <input type="password" class="form-control" id="UserPassword">
            </div>
            <div class="col-md-4 mb-3">
                <label>User role:</label>
                <select class="form-control">
                    <option value="">Select an Option</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <button class="btn btn-primary mt-3" id="btnSubmit" conclick="saveData()">Submit <span class="fas fa-save"></span></button>
            </div>
        </div>
    </div>
<?= ShowFooter() ?>
</body>
</html>
<script>
    var host_url = '<?php echo host_url(); ?>';

    function saveData() {
        var data = {
            FirstName: $('#FirstName').val(),
            MiddleName: $('#MiddleName').val(),
            LastName: $('#LastName').val()
        };

        axios.post(host_url+'Home/SaveTesting', data).then(function(res) {
            console.log('Successful!');
        })
    }
</script>