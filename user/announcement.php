<?php
require "../includes/user-header.php";
require "../libs/server.php";
date_default_timezone_set('Asia/Manila');
$announcementServer = new Server();
$result = $announcementServer->pagination(10);
//$row = mysqli_fetch_array($result['result']);

$current_date = date('d');


?>


<body>
    <div class="wrapper">
        <div class="row">
            <div class="col">
                <a href="#" class="announcement-title fs-1"><b>Announcements</b></a>
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

    <div class="row mx-3 my-5 justify-content-center">
        <div class="col-md-6">
            <?php while ($row = mysqli_fetch_array($result['result'])) {
                $date_created = date('d', strtotime($row['date_created']));
                $days_ago = $current_date - $date_created;
            ?>
                <div class="card mb-4 shadow-lg ">
                    <div class="announcement-header card-header text-center"><b>Posted: </b><?= date('M d, Y', strtotime($row['date_created'])) ?></div>
                    <div class="announcement-body card-body ">
                        <h4 class="card-title"><b><?= $row['about'] ?></b></h4>
                        <p class="card-text"><?= nl2br($row['content']) ?></p>
                    </div>
                    <div class="announcement-footer card-footer text-center">
                    
                        <?php
                        if ($days_ago < 1 ) {
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
</body>