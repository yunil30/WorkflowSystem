<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workflow System</title>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>

    body {
        font-family: "Poppins", sans-serif;
        letter-spacing: 1px;
        color: #17202a;
    }

    .modal {
        display: none;
        background-color: #ffffff;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 100;
        border: 1px solid #d9d9d9;
        border-radius: 5px;
        width: 380px;
    }

    .modal-header {
        padding: 20px 20px 0px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header .modal-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .modal-header .BtnCloseModal {
        cursor: pointer;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .modal-body {
        padding: 0px 20px 0px 20px;
    }

    .modal-button {
        padding: 0px 20px 20px 20px;
        display: flex;
        justify-content: end;
        gap: 10px;
    }
    
    #BtnSubmitModal {
        background-color: #17202a;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-family: "Poppins", sans-serif;
        letter-spacing: 2px;
        color: #d5d8dc;
        padding: 8px;
    }

    #BtnSubmitModal:hover {
        box-shadow: inset 0px 0px 50px rgb(0, 0, 0, 0.5)
    }

    #BtnCloseModal {
        background-color: #c0392b;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-family: "Poppins", sans-serif;
        letter-spacing: 2px;
        color: #d5d8dc;
        padding: 8px;
    }

    #BtnCloseModal:hover {
        box-shadow: inset 0px 0px 50px rgb(0, 0, 0, 0.5)
    }

</style>
<body>
    <!-- Trigger/Open the Modal Button -->
    <button id="ShowModal">Open Modal</button>

    <!-- The Modal -->
    <div class="modal" id="modal">
        <div class="modal-header">
            <label class="modal-title">Modal Title</label>
            <span class="BtnCloseModal">&times;</span>
        </div>
        <div class="modal-body">
            <p>This is the content of the modal.</p>
        </div>
        <div class="modal-button">
            <button id="BtnSubmitModal">Submit</button>
            <button id="BtnCloseModal">Cancel</button>
        </div>
    </div>
</body>
<?= js_container() ?>
</html>
<script>
    $('#ShowModal').click(function() {
        $('#modal').fadeIn();
    });

    $('BtnCloseModal, #BtnCloseModal').click(function() {
        $('#modal').fadeOut();
    });
</script>