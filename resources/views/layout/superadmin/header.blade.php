<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>{{ !empty($page_title) ? $page_title : config('app.name') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>

    <style>
        #search {
            position: relative;
            width: 100%;
            left: 50%;

        }

        p:first-letter {
            text-transform: uppercase;
        }

        .daterangepicker .ranges li.active {
            background-color: #8F3A84;
            color: #fff;
        }

        .daterangepicker td.active,
        .daterangepicker td.active:hover {
            background-color: #8F3A84;
            color: #fff;
        }

        .daterangepicker td.in-range {
            background-color: #FFADF5;
            border-color: transparent;
            color: #000;
            border-radius: 0;
        }

        .daterangepicker td.end-date {
            background-color: #8F3A84;
            color: #fff;
        }

        .daterangepicker .drp-selected {
            display: inline-block;
            font-size: 12px;
            padding-right: 8px;
            color: #8F3A84;
            font-weight: bold;
        }

        .daterangepicker .applyBtn {
            background-color: #8F3A84 !important;
            color: #fff !important;
        }

        .dt-buttons .buttons-csv,
        .dt-buttons .buttons-excel,
        .dt-buttons .buttons-collection,
        .dt-buttons .buttons-pdf,
        .dt-buttons .buttons-print,
        .dt-buttons .buttons-copy {
            background-color: #8F3A84 !important;
            color: #fff !important;
            height: 30px !important;
        }

        .card {
            padding: 10px;
        }

        .filter-card {
            margin-bottom: 20px
        }

        .swal2-cancel {
            margin-top: 0px !important;
        }

        /* notification styles */

        .dropdown-notifications-list {
            max-height: 300px;
            overflow-y: auto;
            position: relative;
        }

        .dropdown-menu {
            width: 350px;
        }

        .avatar-initial {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .dropdown-notifications-item:hover {
            background-color: #f8f9fa;
            cursor: pointer;
        }

        .one-notification-link {
            cursor: pointer;
        }
    </style>
</head>
