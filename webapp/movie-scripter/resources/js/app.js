import './bootstrap';
$('#owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
});

$('#owl-carousel2').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:true
        }
    }
});
$('#owl-carousel3').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:2,
            nav:true,
            loop:true
        }
    }
});
var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

$(".btnopenextract").click(function(){
    $('#extractmodal').fadeIn("slow");
    return false;
});
$(".btncloseuimodal").click(function(){
    $('#extractmodal').fadeOut("slow");
    return false;
});
$( function() {
    $( ".draggable" ).draggable();
    $(".resizable").resizable();
});


// PRELOADER
$('.preloader').delay(1000).slideUp(600);
$( ".preloader2" ).delay(800).animate({
    right: "0",
    width:"0"
  }, 700, function() {
    $('.preloader2').delay(1000).fadeOut(300);
});
$('.preloader3').delay(1000).fadeOut(600);


$(".tablinks").click(function(){
    var id = $(this).attr("id");
    $('.tabcontent').fadeOut(300);
    $('#content_'+id).delay(310).slideDown(300);
});


$('.delform').submit(function() {
    var c = confirm("Are you sure?");
    return c; //you can just return c because it will be true or false
});