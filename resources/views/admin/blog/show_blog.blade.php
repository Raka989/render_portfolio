<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Saurabh Babu Portfolio">
    <meta name="keywords" content="Saurabh Babu, Blog, Portfolio">
    <meta name="author" content="Saurabh Babu">
    <title>Stone</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/fans/images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/data-list-view.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">

    <style>
        td {
            color: black;
        }
        tr {
            border-style: solid;
        }
    </style>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Blog Show</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">Blog List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @elseif(session('failed'))
                <div class="alert alert-danger">
                   {{ session('failed') }}
                </div>
            @endif
        </div>

        <div class="content-body">
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Blog</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>IMAGE</th>
                                                    <th>TITLE</th>
                                                    <th>SHORT DESCRIPTION</th>
                                                    <th>LONG DESCRIPTION</th>
                                                    <th>DATE</th>
                                                    <th colspan="2" style="text-align: center;">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blog as $blogs)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('blog_images/' . $blogs->image) }}" alt="Blog Image" style="height: 100px; object-fit: contain;">
                                                        </td>
                                                        <td>{{ $blogs->title }}</td>
                                                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                            {{ $blogs->short_description }}
                                                        </td>
                                                        <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                            {{ $blogs->long_description }}
                                                        </td>
                                                        <td>{{ $blogs->date }}</td>
                                                        <td>
                                                            <a class="btn btn-danger" href="{{ url('blog_delete/' . $blogs->blog_id) }}">Delete</a>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary" href="{{ url('blog_edit/' . $blogs->blog_id) }}">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- .table-responsive -->
                                </div> <!-- .card-body -->
                            </div> <!-- .card-content -->
                        </div> <!-- .card -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </section>
        </div> <!-- .content-body -->
    </div> <!-- .content-wrapper -->
</div> <!-- .app-content -->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.22.0/apexcharts.min.js"></script>

<script type="text/javascript" src="assets/js/chart.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="assets/js/select2.min.js"></script>
<script type="text/javascript" src="assets/js/moment.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>

<!-- DataTables Vendor JS -->
<script src="../../../app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/remiserbuttons.html5.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/remiserbuttons.print.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>

<script src="../../../app-assets/js/scripts/datatables/datatable.js"></script>

<script src="../../../app-assetss/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../../app-assetss/js/scripts/forms/form-select2.js"></script>

</body>
</html>
