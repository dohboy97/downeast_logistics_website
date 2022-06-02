
//SLIDESHOW PAGE

let slideTracker = 0

if(window.location.pathname == '/home/connor/Desktop/projects/downeast_dev/other_pages/about.html'){

function imageSlider(){

if(slideTracker === 0){
slideTracker = 2

}

else if(slideTracker === 1){
    document.querySelector('.slideshow-4').classList.toggle('hidden');
    document.querySelector('.slideshow-1').classList.toggle('hidden')
    slideTracker = 2

}else if (slideTracker === 2){
    document.querySelector('.slideshow-1').classList.toggle('hidden');
    document.querySelector('.slideshow-2').classList.toggle('hidden');

    slideTracker = 3

}else if (slideTracker === 3){
    document.querySelector('.slideshow-2').classList.toggle('hidden');
    document.querySelector('.slideshow-3').classList.toggle('hidden');
    slideTracker = 4 

}else{

    document.querySelector('.slideshow-3').classList.toggle('hidden');
    document.querySelector('.slideshow-4').classList.toggle('hidden');
    slideTracker = 1

}


}

setInterval(imageSlider,5000)

}

//HAMBURGER MENU

document.querySelector('.hamburger').addEventListener('click',hamburger)

function hamburger(){
    //toggle visibility on mobile nav bar

    if(document.querySelector('.hidden-nav').classList.contains('showMenu')){
        document.querySelector('.hidden-nav').classList.remove('showMenu');
        // document.querySelector('.hidden-nav').classList.toggle('invisible')
    }else{

    // document.querySelector('.hidden-nav').classList.toggle('invisible')
    document.querySelector('.hidden-nav').classList.add('showMenu')
    }
}