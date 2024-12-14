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

            <div class="col-md-12 mb-3 p-0">
                <div class="col-md-6 mb-3 p-0">
                    <label>New Password:</label>
                    <input type="password" class="form-control input-text" id="NewUserPassword">
                </div>

                <div class="col-md-6 mb-3 p-0">
                    <label>Confirm Password:</label>
                    <input type="password" class="form-control input-text" id="ConfirmUserPassword">
                </div>

                <button id="btnConfirmPassword" onclick="confirmPassword()">Confirm</button>
            </div>
        </div>
    </div>
</main>
<?= ShowFooter() ?>
</body>
</html>
<script>
    var host_url = '<?php echo host_url(); ?>';

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

    $('#NewUserPassword, #ConfirmUserPassword').on('input', function() {
        var NewUserPassword = $('#NewUserPassword').val();
        var ConfirmUserPassword = $('#ConfirmUserPassword').val();

        $('#NewUserPassword, #ConfirmUserPassword').removeClass('input-error input-correct');

        if (NewUserPassword && ConfirmUserPassword) {
            if (NewUserPassword === ConfirmUserPassword) {
                $('#NewUserPassword, #ConfirmUserPassword').addClass('input-correct');
            } else {
                $('#NewUserPassword, #ConfirmUserPassword').addClass('input-error');
            }
        }
    });

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

    function updateImageSource(inputSelector, imageSelector) {
        $(inputSelector).on("change", function() {
            var file = this.files[0];
            if (file) {
                $(imageSelector).attr("src", URL.createObjectURL(file));
            }
        });
    }

    $(document).ready(function() {
        updateImageSource('#upload-pic', '#profile-pic');
        ShowAttachment();
    });
</script>