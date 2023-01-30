// Sticky header 
const header = document.querySelector("[data-header]") ;

window.addEventListener('scroll' , ()=> {
    if (!header.classList.contains("no-sticky")) {
        header.classList[scrollY > 100 ? "add" : "remove"]("sticky") ;
    }
} )

// set the start date 
const startDate = document.querySelector('[data-date="start"]') ;
const endDate = document.querySelector('[data-date="end"]') ;

let today = new Date();
let dd = String(today.getDate()).padStart(2, '0');
let mm = String(today.getMonth() + 1).padStart(2, '0');
let yyyy = today.getFullYear();
today = yyyy + '-' + mm + '-' + dd;

if (startDate){

startDate.setAttribute("min", today);

    startDate.addEventListener('change' , ()=> {
        endDate.min =  startDate.value ;
    })
}

// toggle the tabs ["reservation" , "profile"]

const linksTab = document.querySelectorAll('[data-target]') ;
const sectionsTab = document.querySelectorAll('.section-tab') ;

if (linksTab){
    linksTab.forEach((link) => {
        link.addEventListener('click' , (e)=> {
            // set class active 
            e.preventDefault() ;
            linksTab.forEach((link) => link.classList.remove('active') ) ;
            link.classList.add('active') ;
            // show the right section 
            sectionsTab.forEach((sec) => {
                sec.classList.remove('show')  ;
                if (link.dataset.target == sec.dataset.section){
                    sec.classList.add('show') ;
                }
            } 
            )
        })
    })
}

