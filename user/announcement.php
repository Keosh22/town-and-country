<?php
session_start();
?>

<?php
require_once "../includes/user-header.php";
require_once "../libs/server.php";
require_once "../includes/user-header.php";
require_once "../user-panel/user-nav.php";
date_default_timezone_set('Asia/Manila');
$announcementServer = new Server();
$announcementServer->userAuthentication("../user-error-Code/403.php");
$result = $announcementServer->pagination(10);
//$row = mysqli_fetch_array($result['result']);

$current_date = date('d');


?>


<body>
    <main>
        <div class="backbtn-title d-flex flex-column gap-2">

            <!-- First Column -->
            <div class="col-12 back-button">
                <a href="home.php" class="d-flex justify-content-start">
                    <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                </a>
            </div>

            <!-- Second Column -->
            <div class="row d-flex flex-column mt-2 mb-5 ">
                <div class="col option-title">
                    <h1>Announcements</h1>
                </div>
            </div>
            <!-- <div class="table-container row mt-5">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ABOUT</th>
                        <th scope="col">CONTENT</th>
                        <th scope="col">DATE</th>
                        <th scope="col">DATE CREATED</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div> -->
        </div>

        <div class="row mx-3 justify-content-center">

            <div class="col-md-6">
                <?php while ($row = mysqli_fetch_array($result['result'])) {
                    $date_created = date('d', strtotime($row['date_created']));
                    $days_ago = $current_date - $date_created;
                ?>
                    <div class="card mb-4 shadow-lg">
                        <div class="announcement-header card-header text-center"><b>Posted: </b><?= date('M d, Y', strtotime($row['date_created'])) ?></div>
                        <div class="announcement-body card-body ">
                            <h4 class="card-title"><b><?= $row['about'] ?></b></h4>
                            <p class="card-text"><?= nl2br($row['content']) ?></p>
                        </div>
                        <div class="announcement-footer card-footer text-center">

                            <?php
                            if ($current_date == $date_created) {
                            ?>
                                posted today
                            <?php
                            } elseif ($days_ago == 1) {
                            ?>
                                <?= $days_ago ?> day ago
                            <?php
                            } else {
                            ?>
                                <?= $days_ago ?> days ago
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php }
                ?>
                <!-- <div class="card shadow-lg text-center">
                <div class="announcement-header card-header">Meeting title</div>
                <div class="announcement-body card-body">
                    <h5 class="card-title"><b>General Meeting</b></h5>
                    <p class="card-text">Where: Phase 1 Clubhouse</p>
                </div>
                <div class="announcement-footer card-footer">Posted 2 days ago</div>
            </div> -->
            </div>

        </div>
    </main>
</body>