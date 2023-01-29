const app = document.querySelector('.app')
const loading = document.querySelector('.loading') 

onload = () => {
    loading.style.display = "none" ;
    app.style.display = "block"
}

const landing = document.querySelector('.landing') ;
const numberOfItems = document.querySelectorAll('.carsoul-content').length ;
const landingWidth = document.body.getBoundingClientRect().width ;
let counter = 1 ;

function swipper() {
    if (counter < numberOfItems) {
        landing.scrollLeft += landingWidth ;
        counter++ ;
    } else {
        landing.scrollLeft -= (landingWidth * counter) ;
        counter = 1 ;
    }
}

setInterval(()=> {
    swipper() ;
} , 12000)


const bar = document.querySelector('.bar') ;
const links = document.querySelector('.links') ;

bar.onclick = () => {
    links.classList.toggle('active') ;
}