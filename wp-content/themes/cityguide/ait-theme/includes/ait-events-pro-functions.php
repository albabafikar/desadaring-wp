<?php

require_once dirname(__FILE__) . '/AitExtendConfig.php';



add_filter("manage_ait-event-pro_posts_columns" , 'aitManageEventsProColumns');
function aitManageEventsProColumns($columns)
{
	$newColumns = array(
		'item' => __('Item', 'ait-admin'),
	);
	return array_merge($columns, $newColumns);
}



add_action("manage_ait-event-pro_posts_custom_column" , 'aitCustomEventsProColumnValue', 10, 2 );
function aitCustomEventsProColumnValue($column, $postId)
{
	if ($column == 'item') {
		$meta = get_post_meta( $postId, '_ait-event-pro_event-pro-data', true );
		if (isset($meta['item']) and $meta['item'] != 0) {
			echo get_the_title($meta['item']);
		} else {
			echo '';
		}
	}
}



// add colorpicker on edit item category page
add_filter( 'ait-enqueue-admin-assets', function($return){
    if (strpos(get_current_screen()->id,'edit-ait-events-pro') !== false) {
        return true;
    } elseif (strpos(get_current_screen()->id,'edit-ait-items') !== false) {
        return true;
    } elseif (strpos(get_current_screen()->id,'ait_events_pro_options') !== false) {
        return true;
    }
    return $return;
});


















