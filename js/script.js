const sidenav = document.getElementById("mySidenav");
const openBtn = document.getElementById("openBtn");
const closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");
}

let order = 0 ;

document.querySelectorAll(".cart-item").forEach(btn =>{
  btn.addEventListener("click", function(event){
    order += parseInt(event.target.closest(".item").querySelector(".add-qty").value);
    localStorage.setItem("cart", order);
    if (order <= 99) document.querySelector(".cart-nb").textContent = order;
    else document.querySelector(".cart-nb").textContent = "+99";
  })
});

window.addEventListener('load', function () {
  if (localStorage.getItem("cart") === null) return;
  document.querySelector(".cart-nb").textContent = parseInt(localStorage.getItem("cart"));
  order = parseInt(localStorage.getItem("cart"));
});
