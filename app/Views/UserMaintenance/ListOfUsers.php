<!DOCTYPE html>
<html lang="en">
<style>
    .btn-transparent {
        background-color: transparent;
        border: 1px solid transparent;
        color: #007bff;
    }

    .btn-transparent:hover {
        background-color: transparent;
        border: 1px solid #007bff;
        color: #0056b3;
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
            <div class="col-md-12 mb-3 d-flex justify-content-between align-items-center">
                <h3>List of Users</h3>
                <button class="btn btn-primary" id="BtnCreateUser">Add User</button>
            </div>
            <div class="col-md-12 mb-3">
                <table class="table table-hover table-bordered" id="ListOfUsersTable">
                    <thead>
                        <tr>
                            <th class="text-left" style="width: 15%">No.</th>
                            <th class="text-left" style="width: 20%">Username</th>
                            <th class="text-left" style="width: 30%">Fullname</th>
                            <th class="text-left" style="width: 20%">Status</th>
                            <th class="text-center" style="width: 15%">Action</th>
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
        axios.get(host_url + 'Home/GetActiveUsers').then(function(res) {
            if ($.fn.DataTable.isDataTable('#ListOfUsersTable')) {
                $('#ListOfUsersTable').DataTable().destroy();
            }

            $('#LoadData').empty();

            res.data.forEach(function(row, index) {
                $('#LoadData').append(`
                    <tr>
                        <td class="text-left" style="vertical-align: middle;">${index + 1}</td>
                        <td style="vertical-align: middle;">${row.UserName}</td>
                        <td style="vertical-align: middle;">${row.FirstName} ${row.MiddleName} ${row.LastName}</td>    
                        <td style="vertical-align: middle;">${row.UserStatus == 1 ? 'Active' : 'Inactive'}</td>
                        <td style="vertical-align: middle; display: grid; justify-items: center; grid-template-columns: repeat(3, auto);">
                            <button class="btn btn-transparent" onclick="ViewUserRecord(${row.RecID}, '${row.UserName}')"><span class="fas fa-eye"></span></button>
                            <button class="btn btn-transparent" onclick="UpdateUserRecord(${row.RecID}, '${row.UserName}')"><span class="fas fa-pencil"></span></button>
                            <button class="btn btn-transparent" onclick="RemoveUserRecord(${row.RecID}, '${row.UserName}')"><span class="fas fa-trash"></span></button>
                        </td>
                    </tr>
                `);
            });

            $('#ListOfUsersTable').DataTable({
                searching: true,
                pageLength: 10,
                lengthChange: false,
                ordering: true,
                columnDefs: [
                    { type: 'num', targets: 0 }
                ]
            });
        });
    }

    function ViewUserRecord(UserNo, UserName) {
        window.location.href = host_url + 'Home/ViewUserRecord/' + UserNo + '/' + UserName;
    }

    function UpdateUserRecord(UserNo, UserName) {
        window.location.href = host_url + 'Home/UpdateUserRecord/' + UserNo + '/' + UserName;
    }

    function RemoveUserRecord(UserNo, UserName) {
        var data = {
            UserNo: UserNo, 
            UserName: UserName
        }

        axios.post(host_url + 'Home/RemoveUserRecord', data).then(function(res) {
            Swal.fire({
                icon: 'success',
                title: 'Successful!',
                text: UserName + ' has been deactivated.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        window.location.reload()
                    }, 500)
                }
            });
        }).catch(function(error) {
            Swal.fire({
                icon: 'error',
                title: 'Failed!',
                text: error.response?.data?.error || 'An error occurred while removing the user record.',
                confirmButtonText: 'OK'
            });
        });
    }

    $('#BtnCreateUser').click(function() {
        var module2 = host_url + 'Home/CreateUserRecord';
        window.location.href = module2;
    });
</script>
