<?php

require "../includes/user-header.php";
require "../libs/server.php";
$announcementServer = new Server();
$result = $announcementServer->pagination(10);
//$row = mysqli_fetch_array($result['result']);



?>


<body>
    <div class="table-container row mt-5">
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
        
                <?php while($row = mysqli_fetch_array($result['result'])) {?>

                
                    <tr>
                        <td scope=""><?= $row['id']?></td>
                        <td scope=""><?= $row['about']?></td>
                        <td scope=""><?= $row['content']?></td>
                        <td scope=""><?= $row['date']?></td>
                        <td scope=""><?= $row['date_created']?></td>
                
                    </tr>

                <?php }
                ?>
            
          
            </tbody>
        </table>
    </div>
</body>

