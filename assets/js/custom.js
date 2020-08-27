
//Foundation Init
$(document).foundation();

AOS.init({
    easing : 'ease-in-sine',
    anchorPlacement: 'bottom-bottom'
});


//Document ready function scripts 
$(document).ready(function() {
    compile.docLoad();
});


//Window load function scripts
$(window).load(function() {
    compile.winLoad();
});


//Functions
var compile = {

    
    //Document.load scripts
    docLoad: function() {
        
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
    


