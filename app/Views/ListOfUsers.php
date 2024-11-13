<!DOCTYPE html>
<html lang="en">
<style>
    .btn-transparent {
        background-color: transparent;
        border: 1px solid transparent;
        color: #007bff; /* Customize this for your text color */
    }

    .btn-transparent:hover {
        background-color: transparent;
        border: 1px solid #007bff; /* Customize the border color on hover */
        color: #0056b3; /* Customize text color on hover */
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workflow System</title>
</head>
<body>
<?= ShowHeader() ?>
<section>
    <div>
        <div class="col-md-12">
            <div class="col-md-4 mb-3">
                <h3>List of Users</h3>
            </div>
            <div class="col-md-12 mb-3">
                <table class="table table-hover table-bordered" id="ListOfUsersTable">
                    <thead>
                        <tr>
                            <th style="width: 15%">#</th>
                            <th style="width: 20%">Username</th>
                            <th style="width: 30%">Fullname</th>
                            <th style="width: 20%">Status</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="LoadData"></tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= ShowFooter() ?>
</body>
</html>

<script>
    var host_url = '<?php echo host_url(); ?>';

    $(document).ready(function(){
        ShowListOfUsers();
    });

    function ShowListOfUsers() {
        axios.get(host_url + 'Home/GetUsers').then(function(res) {
            res.data.forEach(function(row, index) {
                $('#LoadData').append(`
                    <tr>
                        <td style="vertical-align: middle;">${index + 1}</td>
                        <td style="vertical-align: middle;">${row.UserName}</td>
                        <td style="vertical-align: middle;">${row.FullName}</td>	
                        <td style="vertical-align: middle;">${row.UserStatus == 1 ? 'Active' : 'Inactive'}</td>
                        <td style="vertical-align: middle; display: grid; justify-items: center; grid-template-columns: repeat(3, auto);">
                            <button class="btn btn-transparent"><span class="fas fa-eye"></span></button>
                            <button class="btn btn-transparent"><span class="fas fa-pencil"></span></button>
                            <button class="btn btn-transparent"><span class="fas fa-trash"></span></button>
                        </td>
                    </tr>
                `);
            });
        });
    }
</script>