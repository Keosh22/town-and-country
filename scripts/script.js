// Side bar collapse button
const chevronsElement = document.getElementById("chevron-right");
const sidebarBtnToggler = document.getElementById("sidebar-toggler-btn");

sidebarBtnToggler.addEventListener('click', () => {
  rotateChevrons();
});

function rotateChevrons(){
  chevronsElement.classList.toggle("sidebar-toggler-left");
}



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