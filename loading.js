// Cela permet de remonter tout en haut de la page lorsque l'on la rafraîchit.

history.scrollRestoration = "manual";

$(window).on('beforeunload', function(){
      $(window).scrollTop(0);
});

//Cela permet l'affichage du loading screen et sa dispartion lorsqu'une page est chargée 

$(window).on("load",function(){
    $(".loader-wrapper").fadeOut("slow");
    document.querySelector("body").classList.remove("stop-scrolling");
});