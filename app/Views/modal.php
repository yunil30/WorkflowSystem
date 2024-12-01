<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workflow System</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!-- JS Poppers-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    .modal {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
    }

    .modal-header {
        border: none;
        font-family: "Poppins", sans-serif;
        letter-spacing: 0.1rem;
        padding: 20px 20px 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header .modal-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .modal-header .BtnCloseModal {
        cursor: pointer;
        font-size: 1.5rem;
        font-weight: 400;
    }

    .modal-body {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        letter-spacing: 0.1rem;
        padding: 10px 20px 10px 20px;
    }

    .modal-footer {
        border: none;
        font-family: "Poppins", sans-serif;
        font-size: 0.9rem;
        font-weight: 300;
        padding: 10px 20px 20px 20px;
        display: flex;
        justify-content: end;
        gap: 1px;
    }

    .BtnApprove {
        background-color: #17202a;
        border: none;
        border-radius: 5px;
        color: #d5d8dc;
        letter-spacing: 0.1rem;
        padding: 8px;
    }

    .BtnDisapprove {
        background-color: #c0392b;
        border: none;
        border-radius: 5px;
        color: #d5d8dc;
        letter-spacing: 0.1rem;
        padding: 8px;
    }

    .BtnApprove:hover,
    .BtnDisapprove:hover {
        box-shadow: inset 0px 0px 50px rgb(0, 0, 0, 0.5);
    }
</style>
<body>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title">Identity Verification</label>
                    <span class="BtnCloseModal" data-dismiss="modal">&times;</span>
                </div>
                <div class="modal-body">
                    <label>Enter your password</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="BtnApprove" id="BtnSubmitModal">Submit</button>
                    <button type="button" class="BtnDisapprove" id="BtnCloseModal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>