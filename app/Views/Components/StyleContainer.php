<!-- This is the header section -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<!-- Add SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Add jQuery and DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
<!-- Add Google Font -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<style>
    body{
        font-family: "Poppins", sans-serif;
        /* letter-spacing: .2rem; */
        font-weight: 500;
        margin: 0;
        height: 100vh;
        display: grid;
        grid-template-columns: 14rem 1fr;
        grid-template-rows: 3.5rem 1fr 3.5rem;
        grid-template-areas: 
            "header header"
            "sidebar main"
            "footer footer";
        transition: all 1s ease;
    }

    body.sidebar-minimize{
        /* grid-template-columns: 4rem 1fr; */
        grid-template-columns: 0rem 1fr;
        background-color: #d5d8dc;
    }

    /* header */
    .page-header{
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 1px 10px rgba(0, 0, 0, .5);
        grid-area: header;
        background-color: #17202a;
    }

    .page-header .logo{
        float: left;
        height: 44px;
        padding: .4rem .5rem;
    }

    .page-header #icon-menu{
        float: left;
        font-size: 2rem;
        color: #f2f3f4;
        padding: .4rem .5rem;
        margin-right: 1rem;
    }

    /* sidebar */
    .page-sidebar{
        grid-area: sidebar;
        background-color: #d5d8dc;
        padding: 1rem 0 1rem 1rem;
    }

    .page-sidebar .menu-ul{
        list-style-type: none;
        margin: 0;
        overflow: hidden;
        padding: 0;
        text-align: left;
    }

    .page-sidebar .menu-li{
        font-size: 1rem;
        font-weight: bold;
        padding: 1rem;
        margin-top: 1rem; 
    }

    .page-sidebar .menu-li:hover{
        font-size: 1.3rem;
        font-weight: bold;
        background-color: #f2f3f4;
    }

    .page-sidebar .menu-header{
        font-size: 1rem;
        font-weight: bold;
        padding: 1rem 1rem 0 1rem;
        margin-top: .5rem; 
    }

    .page-sidebar .menu-li a{
        color: #17202a;
        text-decoration: none;
    }

    /* main */
    .page-main{
        grid-area: main;
        background-color: #f2f3f4;
        padding: 1rem;
    }

    /* footer */
    .page-footer{
        grid-area: footer;
        background-color: #17202a;
        text-align: center;
    }

    .page-footer .copyrights{
        color: #f2f3f4;
        padding: 1rem;
    }

    .page-footer p{
        margin: 0;
    }
</style>

<style>
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
</style>

<?= js_container() ?>