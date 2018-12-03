var currentSlideIndex = 0;

function showSelectedSlide(slideIndex) {
    if (slideIndex != currentSlideIndex) {
        currentSlideIndex = slideIndex;
        changeToSlide(slideIndex);
    }
}

function changeToSlide(index) {
    var slides = document.getElementsByClassName("slide");
    for (var i=0; i<slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[index].style.display = "block";
    
    var dots = document.getElementsByClassName("slide-adv-btn");
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active-dot", "");
    }
    dots[index].className += " active-dot";
}