<?php

function aitGetItems($args, $cacheKey = '')
{
     //hot fix for untranslatable cpts
     if(isset($args['post_type'])) {
        if($args['post_type'] == 'ait-event-pro') {
            if ( function_exists('pll_is_translated_post_type') && !pll_is_translated_post_type('ait-event-pro') && isset($args['lang']) ) {
                unset($args['lang']);
            }
        } elseif($args['post_type'] == 'ait-item') {
            if ( function_exists('pll_is_translated_post_type') && !pll_is_translated_post_type('ait-item') && isset($args['lang']) ) {
                unset($args['lang']);
            }
        }
    }
    static $_query;
    if (!empty($cacheKey)) {
        if(!is_null($_query[$cacheKey])){
            return $_query[$cacheKey];
        }
        else {
            $_query[$cacheKey] = new WpLatteWpQuery($args);
            return $_query[$cacheKey];
        }
    } else {
        return new WpLatteWpQuery($args);

    }
}



function aitGetRelatedEvents($itemID)
{
    $args = array(
        'post_type' => 'ait-event-pro',
        'meta_key' => 'ait-event-pro-related-item',
        'meta_value' => $itemID,
    );
    return aitGetItems($args);
}



function aitEventAddress($event, $all = false)
{
    $meta = $event->meta('event-pro-data');
    $useItemLocation = filter_var($meta->useItemLocation, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    if ($useItemLocation and !empty($meta->item)) {
        $itemMeta = get_post_meta($meta->item, '_ait-item_item-data', true);
        if ($all) {
            return $itemMeta['map'];
            // return array(
            //     'address'    => $itemMeta['map']['address'],
            //     'latitude'   => $itemMeta['map']['latitude'],
            //     'longitude'  => $itemMeta['map']['longitude'],
            //     'swheading'  => $itemMeta['map']['swheading'],
            //     'swpitch'    => $itemMeta['map']['swpitch'],
            //     'swzoom'     => $itemMeta['map']['swzoom'],
            //     'streetview' => $itemMeta['map']['streetview'],
            // );
        }
        return $itemMeta['map']['address'];
    } else {
        if ($all) {
            return array(
                'address'   => $meta->map['address'],
                'latitude'  => $meta->map['latitude'],
                'longitude' => $meta->map['longitude'],
                'swheading' => $meta->map['swheading'],
                'swpitch' => $meta->map['swpitch'],
                'swzoom' => $meta->map['swzoom'],
                'streetview' => $meta->map['streetview'],
            );
        }
        return $meta->map['address'];
    }
}


function aitGetNextDate($dates, $from = '', $includeToday = false)
{
    if (empty($dates)) {
        return array();
    }
    $now = empty($from) ? new DateTime() : new DateTime($from);
    $nowTimestamp = ($now->getTimeStamp());

    if (isset($dates[0]) && is_array( $dates[0] )) {
        // dates array consists of elements with dateFrom and dateTo
        foreach ($dates as $date) {
            $newDate = new DateTime($date['dateFrom']);
            $newDateTimestamp = ($newDate->getTimeStamp());
            if ($includeToday) {
                if ($newDateTimestamp >= $nowTimestamp) {
                    return $date;
                }
            } else {
                if ($newDateTimestamp > $nowTimestamp) {
                    return $date;
                }
            }

        }
    } else {
        // simple array of single dates
        foreach ($dates as $date) {
            $newDate = new DateTime($date);
            if ($includeToday) {
                if ($newDate > $now) {
                    return $date;
                }
            } else {
                if ($newDate > $now) {
                    return $date;
                }
            }

        }
    }

    return array();
}



function aitGetRecurringDates($event, $from = '')
{
    $result = array();
    $now = empty($from) ? new DateTime() : new DateTime($from);
    $now = $now->getTimeStamp();

    $meta = $event->meta('event-pro-data');

    $dates = $meta->dates;
    foreach ($dates as $date) {
       if (strtotime($date['dateFrom']) >= $now ) {
            array_push($result, $date);
       }
    }

    return $result;
}


