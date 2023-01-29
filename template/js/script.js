// Sticky header 
const header = document.querySelector("[data-header]") ;

window.addEventListener('scroll' , ()=> {
    header.classList[scrollY > 100 ? "add" : "remove"]("sticky") ;
} )

// set the start date 
const startDate = document.querySelector('[data-date="start"]') ;
const endDate = document.querySelector('[data-date="end"]') ;

let today = new Date();
let dd = String(today.getDate()).padStart(2, '0');
let mm = String(today.getMonth() + 1).padStart(2, '0');
let yyyy = today.getFullYear();
today = yyyy + '-' + mm + '-' + dd;
startDate.setAttribute("min", today);

startDate.addEventListener('change' , ()=> {
    endDate.min =  startDate.value ;
})