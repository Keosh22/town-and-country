$(document).ready(function () {
    var counter = 0;
    var announcement_list = [];
    var announcement_list_length;
    
    $.ajax({
        type: "GET",
        url: "../user-panel/carousel.php",
        success: function (data) {
            announcement_list = data;
            announcement_list_length = announcement_list.length;


            

            // Adjust the appearance of the buttons based on the counter and announcement_list_length
            if (counter == 0) {
                $("#back").css({
                    opacity: "0.5",
                    "pointer-events": "none",
                });
            }

            if (counter == announcement_list_length - 1) {
                $("#next").css({
                    opacity: "0.5",
                    "pointer-events": "none",
                });
            }

            // Update the content of the carousel
            updateCarouselContent();

            // automatic update content of the carousel after interval
            setInterval(function(){
                updateCarouselContent();
                counter += 1;
                if (counter == announcement_list_length) {
                    counter = 0;
                }
            }, 10000)

            
            // Next button 
            $("#next").on("click", function () {
                counter += 1;
                updateCarouselContent();
                updateButtonAppearance();
    

            });

            // back button
            $("#back").on("click", function () {
                counter -= 1;
                updateCarouselContent();
                updateButtonAppearance();

            });
            
        },
        error: function (xhr, status, error) {
            console.error("Error: " + error);
        },

    });



    
    // Function to update the content of the carousel based on the current counter value
    function updateCarouselContent() {

        // Fade out the existing content
        $("#span_about, #span_content, #span_date").fadeOut(400, function() {
            // Update the content with new data
            $("#span_about").text(announcement_list[counter]["about"]);
            $("#span_content").text(announcement_list[counter]["content"]);
            $("#span_date").text(announcement_list[counter]["date"]);
            $("#span_date_created").text(announcement_list[counter]["date_created"]);

   
        
            // Fade in the updated content
            $("#span_about, #span_content, #span_date").fadeIn(400);
        });
        
    }
    

    // Function to update the appearance of the next and previous buttons based on the current counter value
    function updateButtonAppearance() {
        if (counter == 0) {
            $("#back").css({
                opacity: "0.5",
                "pointer-events": "none",
            });
        } else {
            $("#back").css({
                opacity: "1",
                "pointer-events": "auto",
            });
        }

        if (counter == announcement_list_length - 1) {
            $("#next").css({
                opacity: "0.5",
                "pointer-events": "none",
            });
        } else {
            $("#next").css({
                opacity: "1",
                "pointer-events": "auto",
            });
        }
    }


    
});
