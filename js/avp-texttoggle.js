jQuery(document).ready( function($) 
{
    jQuery( 'a.tt-link' ).click( function()
    {
        jQuery(this).next( 'div' ).toggle();
        jQuery(this).children( 'span' ).toggle();
    });
});
 
