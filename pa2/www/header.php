<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico?" type="image/x-icon">

    <title>AutoElect</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/bootstrap.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <!-- http://stackoverflow.com/a/3695453 -->
                    <a href="/dash.php" style="
                        overflow: hidden;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                    ">
                        <?php echo $_SESSION['name']; ?>
                    </a>
                </li>
                <li>
                    <a href="/dash">Dashboard</a>
                </li>
                <li>
                    <a href="/manual">Manual Console</a>
                </li>
                <li>
                    <a href="/invite">Invite</a>
                </li>
                <li>
                    <a href="/troops">Troops</a>
                </li>
                <li>
                    <a href="/elengomats">Elengomats</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">
                             <span class="glyphicon glyphicon-menu-hamburger"></span>
                        </a>
                        <a href="/logout.php" class="btn btn-default">
                            Logout
                        </a>
