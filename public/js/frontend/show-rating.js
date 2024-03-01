$(document).ready(function(){
    $('.restaurant_rating').rating({
        // hoverOnClear: false,
        showClear: false, 
        showCaption:false,
        theme: 'krajee-svg',
        disabled: true,
        starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Great', 4: 'Good', 5: 'Very Good'}
    });
});