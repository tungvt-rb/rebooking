<?php if (!session_id())  session_start();

require_once ( TEMPLATEPATH . '/inc/classes/class.admin.functions.php' );
require_once ( TEMPLATEPATH . '/inc/classes/class.functions.php' );

require_once ( TEMPLATEPATH . '/option-tree/ot-loader.php' );

require_once ( TEMPLATEPATH . '/inc/lib/theme-options.php' );
require_once ( TEMPLATEPATH . '/inc/lib/img_resizer.php' );
require_once ( TEMPLATEPATH . '/inc/lib/breadcrumbs.php' );

global $REBooking, $REBookingAdmin;
$REBooking = new REBooking();
$REBookingAdmin = new REBookingAdmin();

function vrOptionTree($option='', $default='', $echo=1)
{
    $value = function_exists('ot_get_option') ? ot_get_option("vr_$option", $default) : '';
    if ($echo) {
    	echo $value;
    } else {
        return $value;
    }
}