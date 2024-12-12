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
        padding-right: 0 !important
    }

    /* Body Minimize Portion */
    body.sidebar-minimize{
        /* grid-template-columns: 4rem 1fr; */
        grid-template-columns: 0rem 1fr;
        background-color: #d5d8dc;
    }

    /* Header Portion */
    .page-header {
        grid-area: header;
        background-color: #1f2328;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 1px 10px rgba(0, 0, 0, .5);

        .logo {
            float: left;
            height: 44px;
            padding: .4rem .5rem;
        }

        #icon-menu {
            cursor: pointer;
            float: left;
            font-size: 2rem;
            color: #ffffff;
            padding: .4rem .5rem;
            margin-right: 1rem;
        }
    }

    /* Sidebar Portion */
    .page-sidebar {
        grid-area: sidebar;
        background-color: #d5d8dc;
        padding: 1rem 1rem 1rem 1rem;

        .menu-header {
            font-family: "Poppins", sans-serif;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.1rem;
            padding: 0rem 0.5rem 0.5rem 0.5rem;
            margin: 0rem;
        }
        
        .menu-ul {
            cursor: pointer; 
            font-family: "Poppins", sans-serif;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.1rem;
            padding: 1rem 0.5rem 1rem 0.5rem;
            margin: 0rem;
            list-style-type: none;
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            align-items: center;

            &:hover {
                background-color: #ffffff;
                border-radius: 0.3rem;
                font-size: 1.01rem;
            }

            &:active {
                font-size: 1.05rem;
            }
        }

        .submenu_ul {
            list-style-type: none;
            text-align: left;
            padding: 0rem;
            margin: 0rem;
            
            li {
                cursor: pointer;
                font-family: "Poppins", sans-serif;
                font-size: 1rem;
                font-weight: 500;
                letter-spacing: 0.1rem;
                padding: 1rem 0.5rem 1rem 1.1rem;
                margin: 0rem;

                &:hover {
                    background-color: #ffffff;
                    border-radius: 0.3rem;
                    font-size: 1.01rem;
                }

                &:active {
                    font-size: 1.05rem;
                }
            }
        }
    }

    /* Main Portion */
    .page-main {
        grid-area: main;
        background-color: #ffffff;
        padding: 1rem;

        .main-content {
            background-color: #ffffff;
            border: 0.1rem solid #d9d9d9;
            border-radius: 0.3rem;
            padding: 1rem;
            box-shadow: 0px 1px 10px #00000047;
        }

        /* Main page header */
        .page-main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem 0rem 1rem;
            margin: 0;

            h3 {
                font-family: "Poppins", sans-serif;
                font-size: 1.50rem;
                font-weight: 600;
                letter-spacing: 0.1rem;
                margin: 0;
            }

            .page-main-header-btn {
                font-family: "Poppins", sans-serif;
                font-size: 0.9rem;
                font-weight: 400;
                letter-spacing: 0.1rem;
                border: none;
                border-radius: 5px;
                padding: 8px;
            }
        }

        /* Main page conttent */
        .page-main-content {
            padding: 1rem 1rem 0rem 1rem;

            label {
                font-family: "Poppins", sans-serif;
                font-size: 1rem;
                font-weight: 500;
                letter-spacing: 0.1rem;
            }

            .input-text {
                font-family: "Poppins", sans-serif;
                font-size: 1rem;
                font-weight: 400;
                letter-spacing: 0.1rem;

                &:hover,
                &:focus {
                    border: 0.1rem solid #e74c3c;
                    border-color: #1f2328;
                    letter-spacing: 0.1rem;
                    color: #1f2328;
                    outline: none;
                    box-shadow: 0px 0px 3px rgba(23, 32, 42, 0.8);
                }
            }

            .page-main-content-btn {
                font-family: "Poppins", sans-serif;
                font-size: 0.9rem;
                font-weight: 400;
                letter-spacing: 0.1rem;
                border: none;
                border-radius: 5px;
                padding: 8px;
            }
        }

        #ListOfUsersTable {
            thead {
                background-color: #1f2328;

                tr {
                    th {
                        font-family: "Poppins", sans-serif;
                        font-size: 1rem;
                        font-weight: 500;
                        color: #d9d9d9;
                        letter-spacing: 0.1rem; 
                    }
                }
            }

            tbody {
                background-color: #ffffff;

                tr {
                    td {
                        font-family: "Poppins", sans-serif;
                        font-size: 1rem;
                        font-weight: 400;
                        letter-spacing: 0.1rem; 
                    }
                }
            }
        }

        #ListOfUsersTable_info {
            font-family: "Poppins", sans-serif;
            letter-spacing: 0.1rem; 
        }
    }

    /* Footer Portion */
    .page-footer {
        grid-area: footer;
        background-color: #1f2328;
        text-align: center;

        .copyrights {
            padding: 1rem;
        }

        p {
            font-family: "Poppins", sans-serif;
            font-size: 0.9rem;
            font-weight: 300;
            letter-spacing: 0.1rem;
            color: #ffffff;
            margin: 0;
        }
    }

    /* Modal Portion */
    .modal {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;

        .modal-header {
            font-family: "Poppins", sans-serif;
            letter-spacing: 0.1rem;
            border: none;
            padding: 15px 20px 5px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .modal-body {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            letter-spacing: 0.1rem;
            padding: 15px 20px 15px 20px;

            .input-text {
                font-family: "Poppins", sans-serif;
                font-size: 1rem;
                font-weight: 400;
                letter-spacing: 0.1rem;

                &:hover,
                &:focus {
                    border: 0.1rem solid #e74c3c;
                    border-color: #1f2328;
                    letter-spacing: 0.1rem;
                    color: #1f2328;
                    outline: none;
                    box-shadow: 0px 0px 3px rgba(23, 32, 42, 0.8);
                }
            }
        }

        .modal-footer {
            font-family: "Poppins", sans-serif;
            font-size: 0.9rem;
            font-weight: 300;
            border: none;
            padding: 5px 20px 15px 20px;
            display: flex;
            justify-content: end;
            gap: 1px;
        }

        .modal-btn {
            border: none;
            border-radius: 5px;
            letter-spacing: 0.1rem;
            padding: 8px;

            &:active {
                transform: translateY(1px);
            }
        }

        .modal-close {
            cursor: pointer;
            font-size: 1.5rem;
            font-weight: 400;
        }
    }
</style>

<!-- JS Poppers-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


