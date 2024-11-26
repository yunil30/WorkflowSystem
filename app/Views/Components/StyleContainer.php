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

<style>
    body{
        font-family: 'Courier New', Courier, monospace;
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

<?= js_container() ?>