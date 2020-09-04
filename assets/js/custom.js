
//Foundation Init
$(document).foundation();




//Document ready function scripts 
$(document).ready(function() {
    compile.docLoad();
});


//Window load function scripts
$(window).load(function() {
    compile.winLoad();
});


var slickSlider = {
    homeCaseSlider : function(panel){
        var $control = $(panel);
        if ($control[0]) {
            $control.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                dotsClass: 'slick-pager',
                customPaging: function (slider, i) {
                    if(i < 9) dec = "0"; else  dec = ""; 
                    if(slider.slideCount <= 9) dec2 = "0"; else dec2 = "";
                    return dec+(i + 1) + '<small>/' + dec2 + slider.slideCount + '</small>';
                }
            });
        }
    },

    testimonialSlider : function(panel){
        var $control = $(panel);
        if ($control[0]) {
            $control.slick({
                dots: false,
                vertical: true,
                slidesToShow: 2,
                infinite: true,
                addaptiveHeight:true
            });
        }
    }
}

//Functions
var compile = {

    
    //Document.load scripts
    docLoad: function() {

        // AOS.init({
        //     easing : 'ease-in-sine',
        //     anchorPlacement: 'bottom-center',
        //     offset: 240
        // });

       

        if ($('.wow')[0]) {
            $('.wow').each(function(){
                var classlist = $(this).attr('class');
                var getDelayVal = '';
                if( classlist.indexOf('wow-delay-') > -1 ){
                    var cla = classlist.split(/\s+/);
                    cla.forEach(function(itm, idx){
                        if (itm.indexOf('wow-delay-') > -1) {
                            getDelayVal = itm.replace('wow-delay-','');
                        }
                    })

                    $(this).attr('data-wow-delay','0.'+getDelayVal+'s');
                }
            });

             new WOW().init();
        }

        slickSlider.homeCaseSlider('.cases-slider');
        slickSlider.testimonialSlider('.testi-slider');


        //Fields Placeholder
        $('.field.js label').click(function() {
            $(this).next().focus();
        });
        $('.field.js input, .field.js select, .field.js textarea').each(function() {
            if ($(this).val() != '') {
                $(this).parent().addClass('focus');
            }
        });
        $('.field.js input, .field.js select, .field.js textarea').blur(function() {
            if ($(this).val() == '') {
                $(this).parent().toggleClass('focus');
            }
        });
        $('.field.js input, .field.js select, .field.js textarea').focus(function() {
            if ($(this).val() == '') {
                $(this).parent().toggleClass('focus');
            }
        });

        document.addEventListener( 'wpcf7mailsent', function( event ) {
          location = '/thank-you';
        }, false );
    },
    
    //windown.load scripts
    winLoad: function() {

    }

}
    


