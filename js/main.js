
let slideTracker = 0

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




// function slideshow(){
//     for(let i = 1; i <= 4; i++){
//         document.querySelector(`.slideshow-${i}`).classList.toggle('hidden')
        
//     }
// }

// setInterval(slideshow,5000)