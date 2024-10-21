<?php   
error_reporting(0);
include "class/Database.php";
include "class/crud.php";
include "class/ecrypt_id.php";

$database = new Database();
$db = $database->getConnection();
 $user = new User($db);

if ($user->get_sessi()) {
    header('location: media.php');
}


 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Sistema GABPAM - <?= date('Y') ?></title>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/datatablesBootV3.2.0/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/datatablesBootV3.2.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/datatablesBootV3.2.0/css/dataTables.bootstrap.min.css">

    <!-- jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="assets/datatablesBootV3.2.0/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
    <script src="assets/datatablesBootV3.2.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-9/5N2kzyVp2cK5kU2BQoGCmBYA5x5mP2LnMNqrDcvKuWu1pD7v4AlwFz+nEOU4N+PMrKlSHeRxWgI8K+XYy+mQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-Ylq8CHkcS8O91d/FNQCOW3/8LMY9DcvVxP1/lUzREuFPm0SYXCNQ2z5IcENHPCg5OPr3sU6+1C+/5zGqI0EH+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


    <!-- DataTables JS -->
    <!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
    <script src="assets/datatablesBootV3.2.0/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script> -->
    <script src="assets/datatablesBootV3.2.0/js/dataTables.bootstrap.min.js"></script>
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0 10px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #337ab7;
            color: #fff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button a {
            color: #337ab7;
        }

        /* Override default sorting icons */
        .dataTables_wrapper .dataTables_sort_icon {
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            display: inline-block;
            vertical-align: middle;
        }
        .dataTables_wrapper .sorting_asc .dataTables_sort_icon:before {
            content: "\f0de"; /* Font Awesome icon for sort ascending */
        }
        .dataTables_wrapper .sorting_desc .dataTables_sort_icon:before {
            content: "\f0dd"; /* Font Awesome icon for sort descending */
        }
    </style>

    <!-- ------------------------------------------------------------------------------------------------------ -->

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="container">
	<div class="row">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
			<br><br><br><br><br>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title padding-0">
						<h3>Login</h3>
					</div>
				</div>
				<div class="panel-body">
					<form action="chek_login.php" method="POST">
						<input type="text" class="form-control" name="username" placeholder="Username" required>
						<br>
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<br>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-4"></div>
	</div>
</div>
    
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
