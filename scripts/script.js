const chevronsElement = document.getElementById("chevron-right");

const sidebarBtnToggler = document.getElementById("sidebar-toggler-btn");

sidebarBtnToggler.addEventListener('click', () => {
  rotateChevrons();
});




function rotateChevrons(){
  chevronsElement.classList.toggle("sidebar-toggler-left");
}