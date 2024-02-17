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
        <div class="row d-flex flex-column mt-2 mb-5 ">
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

                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tech,street');">
                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">

                                <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Fogging</a></h4>
                                <p>Elevate cleanliness with our advanced fogging treatments. Our fine mist disinfectants reach every nook and cranny, ensuring thorough germ elimination. From homes to offices, experience a precise and effective solution for a safer environment.</p>

                            </div>

                            <div class="card-footer">
                                <div class="media">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tree,nature');">
                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tree,nature" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">

                                <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Work Order</a></h4>
                                <p>
                                    A work order is a formal document or request issued by an organization, typically to its internal departments or external service providers, outlining specific details and instructions for a particular job or task.
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="media">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?computer,design');">
                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?computer,design" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">

                                <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Grass Cutting</a></h4>
                                <p>
                                    Transform your outdoor space into a verdant paradise with our expert grass cutting services. Our team of skilled professionals is dedicated to creating and maintaining impeccably manicured lawns that reflect the beauty of nature.
                                </p>
                                <a class="btn btn-flat btn-success" id="grass_cutting" href="#grassCuttingRequestModal" data-bs-toggle="modal">Request</a>
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

        })
    });
</script>
<?php
// 
include("../user-views/grass_cutting_request_modal.php");

?>