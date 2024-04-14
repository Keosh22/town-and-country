<main>
    <!-- First Column -->
    <div class="backbtn-title d-flex flex-column ">

        <!-- First Column -->
        <div class="col-12 back-button">
            <a href="home.php" class="d-flex justify-content-start">
                <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
            </a>
        </div>

        <!-- Second Column -->
        <div class="row d-flex flex-column mt-2  header-services ">
            <div class="col option-title">
                <h1>Our Services</h1>
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
    <!-- Second Column -->

    <section class="wrapper">

        <div class="container">

            <div class="row">

                <div class="col-sm-12 col-md-6 col-lg-4 mb-4 card-container">
                    <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tech,street');">
                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">

                                <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Tree Pruning</a></h4>
                                <!-- <p>Tree pruning is an essential part of maintaining the health and beauty of your trees, it is also a safety precaution to minimize the liability from falling branches.</p> -->
                                <a class="btn btn-flat btn-success" id="tree_pruning" href="#requestModal" data-bs-toggle="modal">Request</a>
                            </div>

                            <div class="card-footer">
                                <div class="media">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-sm-12 col-md-6 col-lg-4 mb-4 card-container">
                    <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tree,nature');">
                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tree,nature" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">

                                <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Street Sweeping</a></h4>
                                <!-- <p>
                                    Street sweeping is an essential maintenance procedure that helps our communities. Through thorough removal of dirt, debris, and trash from road surfaces, street sweeping keeps our roadways safe and clear for all users.
                                </p> -->
                                <a class="btn btn-flat btn-success" id="street_sweeping" href="#requestModal" data-bs-toggle="modal">Request</a>
                            </div>
                            <div class="card-footer">
                                <div class="media">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4 card-container">
                    <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?computer,design');">
                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?computer,design" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">

                                <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Grass Cutting</a></h4>
                                <!-- <p>
                                    Transform your outdoor space into a verdant paradise with our expert grass cutting services. Our team of skilled professionals is dedicated to creating and maintaining impeccably manicured lawns that reflect the beauty of nature.
                                </p> -->
                                <a class="btn btn-flat btn-success" id="grass_cutting" href="#requestModal" data-bs-toggle="modal">Request</a>
                            </div>
                            <div class="card-footer">
                                <div class="media">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main>
<script>
    $(document).ready(function() {

        $("#grass_cutting").on('click', function() {
            var service_maintenance = "Grass Cutting";
            $("#service_maintenance").val(service_maintenance);

            $("#request_grasscutting_btn").show();
            $("#request_grasscutting_btn").prop('disabled', false);

            $("#request_streetsweeping_btn").hide();
            $("#request_streetsweeping_btn").prop('disabled', true);
            $("#request_treepruning_btn").hide();
            $("#request_treepruning_btn").prop('disabled', true);
        });

        $("#street_sweeping").on('click', function() {
            var service_maintenance = "Street Sweeping";
            $("#service_maintenance").val(service_maintenance);

            $("#request_streetsweeping_btn").show();
            $("#request_streetsweeping_btn").prop('disabled', false);

            $("#request_grasscutting_btn").hide();
            $("#request_grasscutting_btn").prop('disabled', true);
            $("#request_treepruning_btn").hide();
            $("#request_treepruning_btn").prop('disabled', true);
        });

        $("#tree_pruning").on('click', function() {
            var service_maintenance = "Tree Pruning";
            $("#service_maintenance").val(service_maintenance);

            $("#request_treepruning_btn").show();
            $("#request_treepruning_btn").prop('disabled', false);

            $("#request_grasscutting_btn").hide();
            $("#request_grasscutting_btn").prop('disabled', true);
            $("#request_streetsweeping_btn").hide();
            $("#request_streetsweeping_btn").prop('disabled', true);
        });

    });
</script>
<?php
//  grass cutting
include("../user-views/request_modal.php");

?>

<?php
require_once("../includes/footer.php");
?>