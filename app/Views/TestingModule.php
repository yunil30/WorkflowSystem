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
    <div class="col-md-12 main-content">
        <div class="col-md-12 page-main-header mb-3">
            <h3>User Profile</h3>
            <button class="btn page-main-header-btn btn-danger" id="BtnListOfUsers">Back <span class="fas fa-arrow-left"></span></button>
        </div>
        <div class="col-md-12 page-main-content mb-3">  
         
            <div class="col-md-4 mb-3 p-0">
                <label>Attachment:</label>
                <input type="file" class="form-control-file" id="AttachMentlength">
            </div>
            <button onclick="CreateFolder()">Create</button>
        </div>
    </div>
</main>
<?= ShowFooter() ?>
</body>
</html>
<script>
    var host_url = '<?php echo host_url(); ?>';

    function CreateFolder() {
        var fileInput = $('#AttachMentlength'); // Select the file input element
        var file = fileInput.prop('files')[0]; // Get the first file from the input

        if (!file) {
            console.log('No attachment found!');
            return;
        }

        var formdata = new FormData();
        formdata.append('attachedMemorandum', file); // Append the file to the FormData

        console.log('Attachment: ', file.name);

        // axios.post(host_url + 'Home/CreateFolder', formdata, {
        //     headers: { 'Content-Type': 'multipart/form-data' }
        // })
        // .then(function(res) {
        //     console.log(res.data);
        // })
        // .catch(function(err) {
        //     console.error('Error uploading file:', err);
        // });
    }
</script>