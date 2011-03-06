$(function() {
	$('#slider').nivoSlider({
		effect:'random',
        slices:10,
        animSpeed:800,
        pauseTime:3000,
        startSlide:0,
        directionNav:true,
        directionNavHide:true,
        controlNav:true, 
        controlNavThumbs:false, 
        pauseOnHover:true, 
        manualAdvance:false, 
        captionOpacity:0.6, 
	});
});