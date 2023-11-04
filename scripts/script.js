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



// $(document).ready(function (){
//   $("button.btn-sidebar").on('click', function (){
//     $("button.btn-sidebar").removeClass("active");
//     $(this).addClass("active");
    
//   });
// })






// $(document).ready(function (){
  
//   // dashboard button
//   $("button.dashboard-btn").on('click', function (){
//     sessionStorage.clear()
//     sessionStorage.setItem("dashboardBtn", "active");
//   });
//   // Homeowners Button
//   $("button.homeowners-btn").on('click', function (){
//     sessionStorage.clear()
//     sessionStorage.setItem("homeownersBtn", "active");
//   });
//   // user management button
//   $("button.user-btn").on('click', function (){
//     sessionStorage.clear()
//     sessionStorage.setItem("userBtn", "active");
//   });


    

//     // if(sessionStorage.getItem('activeClass') === 'true'){
//     //   $("button.btn-sidebar").removeClass("active");
//     //   $(this).addClass("active");
//     // }
    
 

//   if(sessionStorage.getItem('dashboardBtn') ){
    
//     const activeState = sessionStorage.getItem('dashboardBtn');
//     console.log(activeState);
//     $("button.btn-sidebar").removeClass(activeState);
//     $("button.dashboard-btn").addClass(activeState);
// }
//   if(sessionStorage.getItem('userBtn') ){
//     const active = sessionStorage.getItem('userBtn');
//     $("button.btn-sidebar").removeClass(active);
//     $("button.user-btn").addClass(active);
// }




// })









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