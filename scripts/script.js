// Side bar collapse button
const chevronsElement = document.getElementById("chevron-right");
const sidebarBtnToggler = document.getElementById("sidebar-toggler-btn");

sidebarBtnToggler.addEventListener('click', () => {
  rotateChevrons();
  document.querySelector("#sidebar").classList.toggle("collapsed")
});

function rotateChevrons(){
  chevronsElement.classList.toggle("sidebar-toggler-left");
}

$(document).ready(function (){
  $("button.btn-sidebar").on('click', function (){
    $("button.btn-sidebar").removeClass("active");
    $(this).addClass("active");
  
  });
})

$(document).ready(function(){
  $("button.btn-dropdown").on('click', function (){
    $("button.btn-dropdown").removeClass("active-dropdown");
      $(this).addClass("active-dropdown");
  
});
});



// Sidebar dropwdown chevron
// $(document).ready(function() {
  
//   $(".homeowners-btn").on('click', function(){
      
//     $(".btn-dashboard-dropdown").toggleClass("btn-dashboard-toggle");
//     $(".sidebar-dropdown").toggleClass("sidebar-dropdown-toggle");

   
//   });
//   //    $(".bxs-chevron-up").toggleClass("rotate-chevron-up");
//   //   $(".btn-dashboard-dropdown").toggleClass("btn-dashboard-toggle");
//   //   $(".sidebar-dropdown").toggleClass("sidebar-dropdown-toggle");
//   // });
// });