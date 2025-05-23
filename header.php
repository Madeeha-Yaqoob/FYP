<?php

$stmt = $pdo->prepare("SELECT message, link FROM notifications WHERE resident_id = ? AND read_status = ? ORDER BY id DESC");

$stmt->execute([$_SESSION['resident_id'], 'unread']);

$notification = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>housing management system</title>
    <link rel="icon" type="image/png" href="logo.png">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css">
    <link rel='stylesheet' href="style.css">
</head>

<body>
    <nav class="sb-topnav navbar">
        <!-- Navbar Brand
        <a class="navbar-brand ps-3" href="index.html">Housify</a> -->
        <!-- Sidebar Toggle
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarnotificationDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo (count($notification) > 0) ? '<span class="badge bg-danger">' . count($notification) . '</span>' : ''; ?><i class="fa-solid fa-bell"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarnotificationDropdown" style="max-width: 350px; max-height: 400px; overflow: scroll;">
                    <?php
                    if (count($notification) > 0) {
                        foreach ($notification as $msg) {
                            echo '<li><a class="dropdown-item" href="' . $msg["link"] . '">' . $msg["message"] . '</a></li>';
                        }
                    } else {
                        echo '<li>No Notification Found</li>';
                    }
                    ?>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav">
                <div class="sb-sidenav-menu">
                     <!-- Navbar Brand-->
                     <a class="navbar-brand ps-3" href="index.php">
                     <img src="logo.png" alt="logo" height="500px" weight="500px" /></a>
                    <div class="nav">
                        <?php
                        if ($_SESSION['resident_role'] == 'admin') {
                        ?>
                            <a class="nav-link" href="resident.php">
                                Residents
                            </a>
                            <a class="nav-link" href="house.php">
                                Houses
                            </a>
                            <a class="nav-link" href="available.php">
                                Available Houses
                            </a>
                            <a class="nav-link" href="maintenance.php">
                                Maintenance Bills
                            </a>
                            <a class="nav-link" href="complaints.php">
                                Complaints
                            </a>
                            <a class="nav-link" href="visitor.php">
                                Visitors
                            </a>
                            <a class="nav-link" href="facility.php">
                                Facilities
                            </a>
                            <a class="nav-link" href="service.php">
                                Services
                            </a>
                            <a class="nav-link" href="Payment.php">
                                Payments
                            </a>
                            <a class="nav-link" href="reports.php">
                                Reports
                            </a>
                        <?php
                        }

                        if ($_SESSION['resident_role'] == 'user') {
                        ?>
                            <a class="nav-link" href="maintenance.php">
                                Maintenance
                            </a>
                            <a class="nav-link" href="complaints.php">
                                Complaints
                            </a>
                            <a class="nav-link" href="visitor.php">
                                Visitors
                            </a>
                            <a class="nav-link" href="facility.php">
                                Facilities
                            </a>
                            <a class="nav-link" href="service.php">
                                Services
                            </a>
                            <a class="nav-link" href="Payment.php">
                                Payments
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged In as:</div>
                    <?php echo $_SESSION['resident_name']; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>