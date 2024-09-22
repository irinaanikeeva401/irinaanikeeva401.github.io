$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        navigation : true, // Show next and prev buttons
        nav: true,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        items:1,
        autoPlay: true,
        autoPlay : 3000,
        baseClass : "owl-carousel",
        theme : "owl-theme",
        rewindNav : true
        
      });
});