jQuery(document).ready( function($) 
{
    jQuery( 'a.tt-link-part' ).click( function()
    {
        $class = jQuery(this).attr( 'id' );
        if ( jQuery(this).children( 'span.tt-span-part-hide' ).css( 'display' ) === 'none' )
        {
            jQuery(document).find( 'div.tt-div-' + $class ).show();
            jQuery(document).find( 'span.tt-span-hide-' + $class ).show();
            jQuery(document).find( 'span.tt-span-show-' + $class ).hide();
            jQuery(document).find( 'span.tt-span-part-hide-' + $class ).show();
            jQuery(document).find( 'span.tt-span-part-show-' + $class ).hide();
        }
        else
        {
            jQuery(document).find( 'div.tt-div-' + $class ).hide();
            jQuery(document).find( 'span.tt-span-hide-' + $class ).hide();
            jQuery(document).find( 'span.tt-span-show-' + $class ).show();
            jQuery(document).find( 'span.tt-span-part-hide-' + $class ).hide();
            jQuery(document).find( 'span.tt-span-part-show-' + $class ).show();
        }
    });
});
 
