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
<style>
    img {
        height: 150px;
        width: 150px;
        border-radius: 50%;
        object-fit: cover;
        background-color: #dfdfdf;
    }

    .input-error {
        border: 0.1rem solid #e74c3c;
    }
</style>
<main class="page-main">
    <div class="col-md-12 main-content">
        <div class="col-md-12 page-main-header mb-3">
            <h3>User Profile</h3>
            <button class="btn page-main-header-btn btn-danger" id="BtnListOfUsers">Back <span class="fas fa-arrow-left"></span></button>
        </div>
        <div class="col-md-12 page-main-content mb-3">  
            <div class="col-md-12 mb-3 p-0">
                <div class="col-md-6 mb-3">
                    <img src="img.png" id="profile-pic">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="file" class="form-control-file" id="upload-pic">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <button type="button" class="btn btn-default" id="BtnChangePassword">Change Password</button>
                </div>
                <div class="col-md-4 mb-3">
                    <label>First name:</label>
                    <input type="text" class="form-control input-text" id="FirstName" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Middle name:</label>
                    <input type="text" class="form-control input-text" id="MiddleName" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Last name:</label>
                    <input type="text" class="form-control input-text" id="LastName" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Username:</label>
                    <input type="text" class="form-control input-text" id="UserName" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Email address:</label>
                    <input type="text" class="form-control input-text" id="UserEmail" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label>User role:</label>
                    <select class="form-control" id="UserRole" disabled>
                        <option value="">Select an Option</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="ChangePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title">Change Password</label>
                <span class="modal-close" data-dismiss="modal">&times;</span>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-3 p-0">
                    <label>New Password:</label>
                    <input type="password" class="form-control input-text" id="NewUserPassword">
                </div>
                <div class="col-md-12 mb-3 p-0">
                    <label>Confirm Password:</label>
                    <input type="password" class="form-control input-text" id="ConfirmUserPassword">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-btn btn-success" id="BtnChangeUserPassword">Confirm</button>
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

    $('#ConfirmUserPassword').on('input', function() {
        var NewUserPassword = $('#NewUserPassword').val();
        var ConfirmUserPassword = $('#ConfirmUserPassword').val();

        $('#NewUserPassword, #ConfirmUserPassword').removeClass('input-error input-correct');

        if (NewUserPassword === ConfirmUserPassword && ConfirmUserPassword !== "") {
            $('#NewUserPassword, #ConfirmUserPassword').addClass('input-correct');
        } else if (ConfirmUserPassword !== "") {
            $('#NewUserPassword, #ConfirmUserPassword').addClass('input-error');
        }
    });

    $('#NewUserPassword').on('input', function() {
        var NewUserPassword = $('#NewUserPassword').val();
        var ConfirmUserPassword = $('#ConfirmUserPassword').val();

        $('#NewUserPassword, #ConfirmUserPassword').removeClass('input-error input-correct');

        if (NewUserPassword !== "" || NewUserPassword === "") {
            $('#NewUserPassword, #ConfirmUserPassword').removeClass('input-error input-correct');
        } else if (NewUserPassword !== ConfirmUserPassword) {
            $('#NewUserPassword, #ConfirmUserPassword').addClass('input-error');
        }
    });

    $('#BtnChangePassword').click(function() {
        $('#BtnChangePassword').attr({
            'data-toggle': 'modal',
            'data-target': '#ChangePasswordModal'
        });
    });

    function CreateFolder() {
        var fileInput = $('#AttachMentlength');
        var file = fileInput.prop('files')[0];

        if (!file) {
            console.log('No attachment found!');
            return;
        }

        var formdata = new FormData();
        formdata.append('Attachment', file); 

        axios.post(host_url + 'Home/CreateFolder', formdata).then(function(res) {
            console.log(res.data);
        });
    }

    function ShowAttachment() {
        axios.get(host_url + 'Home/ShowAttachment').then(function(res) {
            if (res.data.length > 0) {
                let url = '<?php echo WfsUploads_url(); ?>';
                let folderName = res.data[0].folder_name;
                let fileName = res.data[0].file_name;
                let path = url + folderName + '/' + fileName;
                $('#DownloadAttachment').attr('href', path);
            }
        });
    }

    function ShowMessage(icon, title, position = 'center', url = '') {
        Swal.fire({
            icon: icon,
            title: title,
            position: position, 
            showConfirmButton: false,
            timer: 3000, 
            timerProgressBar: true, 
            heightAuto: false, 
        }).then((result) => {
            if (result.isConfirmed && url !== '') {
                httpGet(url); 
                history.pushState({ prevUrl: window.location.href }, '', url);
            }
        });
    }

    function UpdatePassword() {
        var data = {
            NewPassword: $('#NewUserPassword').val(),
        };

        axios.post(host_url + 'Home/ChangePassword', data).then(function(res) {
            Swal.fire({
                icon: 'success',
                title: 'Successful!',
                text: 'Your Password have been successfully changed.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        window.location.reload()
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

    $('#BtnChangeUserPassword').click(function() {
        if ($('#NewUserPassword').val() === '') {
            ShowMessage('error', 'Please enter a new password!');
            $('#NewUserPassword').trigger('chosen:activate');
            return false;
        }

        if ($('#ConfirmUserPassword').val() === '') {
            ShowMessage('error', 'Please confirm your new password!');
            $('#ConfirmUserPassword').trigger('chosen:activate');
            return false;
        }

        if ($('#NewUserPassword').val() !== $('#ConfirmUserPassword').val()) {
            ShowMessage('error', 'Passwords do not match. Please try again.');
            $('#NewUserPassword').trigger('chosen:activate');
            return false;
        }

        UpdatePassword()
    });

    $('#BtnListOfUsers').click(function() {
        var ShowListOfUsers = host_url + 'Home/ShowListOfUsers';
        window.location.href = ShowListOfUsers;
    });

    function updateImageSource(inputSelector, imageSelector) {
        $(inputSelector).on("change", function() {
            var file = this.files[0];
            if (file) {
                $(imageSelector).attr("src", URL.createObjectURL(file));
            }
        });
    }

    function ViewUserProfile() {
        axios.get(host_url + 'Home/GerUserProfile').then(function(res) {
            var UserProfile = res.data[0];
            $('#FirstName').val(UserProfile.FirstName);
            $('#MiddleName').val(UserProfile.MiddleName);
            $('#LastName').val(UserProfile.LastName);
            $('#UserName').val(UserProfile.UserName);
            $('#UserEmail').val(UserProfile.UserEmail);
            $('#UserRole').val(UserProfile.UserRole);
s        });
    }

    

    $(document).ready(function() {
        updateImageSource('#upload-pic', '#profile-pic');
        ShowAttachment();
        ViewUserProfile();
    });
</script>