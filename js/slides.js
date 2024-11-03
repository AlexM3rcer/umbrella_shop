document.addEventListener('DOMContentLoaded', () => {
    slides();
    setInterval(function() {
        slides();
    }, 24000);
})

function slides() {
    $('#slide1').fadeTo(3000, 0)

    setTimeout(() => $('#slide2').fadeTo(3000, 0), 6000);
    
    setTimeout(() => $('#slide2').fadeTo(3000, 1), 12000);

    setTimeout(() => $('#slide1').fadeTo(3000, 1), 18000);
}