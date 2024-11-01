jQuery(document).ready( function($) 
{
    jQuery( 'a.tt-link-all' ).click( function()
    {
        //  If the 'hide' character is not visible (still set to 'display:none;')
        //  Then the sections are hidden and need to be shown
        if ( jQuery(this).children( 'span.tt-span-all-hide' ).css( 'display' ) === 'none' )
        {
            jQuery(document).find( 'div.tt-div' ).show();
            jQuery(document).find( 'span.tt-span-hide' ).show();
            jQuery(document).find( 'span.tt-span-show' ).hide();
            jQuery(document).find( 'span.tt-span-all-hide' ).show();
            jQuery(document).find( 'span.tt-span-all-show' ).hide();
            jQuery(document).find( 'span.tt-span-part-hide' ).show();
            jQuery(document).find( 'span.tt-span-part-show' ).hide();
        }
        else
        {
            jQuery(document).find( 'div.tt-div' ).hide();
            jQuery(document).find( 'span.tt-span-hide' ).hide();
            jQuery(document).find( 'span.tt-span-show' ).show();
            jQuery(document).find( 'span.tt-span-all-hide' ).hide();
            jQuery(document).find( 'span.tt-span-all-show' ).show();
            jQuery(document).find( 'span.tt-span-part-hide' ).hide();
            jQuery(document).find( 'span.tt-span-part-show' ).show();
        }
    });
});
 
