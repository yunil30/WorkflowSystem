<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workflow System</title>
    <?= css_container() ?>
</head>
<style>
    #ProfilePictureDiv {
        display: flex;
        justify-content: center;
        align-items: center;

        #ProfilePicture {
            border-radius: 90%;
            height: 150px;
            width: 150px;
            object-fit: cover;
            background-color: #dfdfdf;
        }
    }

    #FullName {
        font-family: "Poppins", sans-serif;
        font-size: 1.5rem;
        font-weight: 500;
        letter-spacing: 0.1rem;
    }
</style>
<body>
<?= ShowHeader() ?>
<main class="page-main">
    <div class="col-md-12 main-content">
        <div class="col-md-12 page-main-header mb-3">
            <h3>User Profile</h3>
            <button class="btn page-main-header-btn btn-danger" id="BtnListOfUsers">Back <span class="fas fa-arrow-left"></span></button>
        </div>
        <div class="col-md-12 page-main-body mb-3">
            <div class="col-md-12 mb-3 p-0" id="ProfilePictureDiv">
                <img id="ProfilePicture">
            </div>
            <div class="col-md-12 mb-3 p-0" id="ProfilePictureDiv">
                <h3 id="FullName"></h3>
            </div>
            <div class="col-md-12 mb-3 p-0">
                <label>Role:</label>
            </div>
            <div class="col-md-12 mb-3 p-0">
                <label>Username:</label>
            </div>
            <div class="col-md-12 mb-3 p-0">
                <label>Username:</label>
            </div>
            <div class="col-md-12 mb-3 p-0">
                <label>Username:</label>
            </div>
        </div>
    </div>
</main>
<?= ShowFooter() ?>
</body>
</html>
<script>
    var host_url = '<?php echo host_url(); ?>';

    function ViewUserProfile() {
        axios.get(host_url + 'Home/GetUserProfile').then(function(res) {
            var UserProfile = res.data[0];
            let Folder = UserProfile.FolderName;
            let Picture = UserProfile.PicName;
            let path = '../ProfilePictures/' + Folder + '/' + Picture;

            console.log();
            
            
            $('#ProfilePicture').attr('src', path);
            $('#FullName').text(UserProfile.FirstName + ' ' + UserProfile.MiddleName + ' ' + UserProfile.LastName);
        });
    }

    $(document).ready(function() {
        ViewUserProfile();
    });
</script>