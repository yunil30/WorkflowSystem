<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workflow System</title>
</head> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
<!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->
<style>
    /* body {
        font-family: "Poppins", sans-serif;
        letter-spacing: 1px;
        color: #17202a;
    } */

    .modal {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
    }

    .modal-header {
        padding: 20px 20px 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header .modal-title {
        letter-spacing: 0.1rem;
        font-size: 20px;
        font-weight: 500;
    }

    .modal-header .BtnCloseModal {
        cursor: pointer;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .modal-body {
        padding: 0px 20px 0px 20px;
    }

    .modal-footer {
        padding: 10px 20px 20px 20px;
        display: flex;
        justify-content: end;
        gap: 1px;
    }
    
    #BtnSubmitModal {
        background-color: #17202a;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-family: "Poppins", sans-serif;
        font-size: 15px;
        letter-spacing: 0.1rem;
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
        font-size: 15px;
        letter-spacing: 0.1rem;
        color: #d5d8dc;
        padding: 8px;
    }

    #BtnCloseModal:hover {
        box-shadow: inset 0px 0px 50px rgb(0, 0, 0, 0.5)
    }

    input {
        width: 100%;
        margin-bottom: 10px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    #password {
        border-radius: 5px;
        letter-spacing: 0.1rem;
        font-size: 15px;
        color: #17202a;
        margin-bottom: 0;
    }

    #password:hover,
    #password:focus {
        border: 0.1rem solid #e74c3c;
        border-color: #17202a;
        letter-spacing: 0.1rem;
        color: #17202a;
        outline: none;
        box-shadow: 0px 0px 3px rgba(23, 32, 42, 0.8);
    }
</style>
<!-- <body>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title">Identity Verification</label>
                    <span class="BtnCloseModal" data-dismiss="modal">&times;</span>
                </div>
                <div class="modal-body">
                    <label>Enter your password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password">
                </div>
                <div class="modal-footer">
                    <button type="button" id="BtnSubmitModal">Submit</button>
                    <button type="button" id="BtnCloseModal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- </body> -->
<!-- </html> -->