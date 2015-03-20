<?php
/**
 * Created by IT-SOLUTIONS.
 * IS CMS
 * User: Vati Child
 * Date: 3/7/15
 * Time: 11:09 PM
 */
defined('_JEXEC') or die();

$registry['currency'] = $DB->getAll("SELECT * FROM #__currency");
foreach($registry['currency'] as $item):
    if($item['name'] == 'USD'):
        $registry['usd'] = array($item['currency'],$item['last'],$item['arrow']);
    endif;
    if($item['name'] == 'EUR'):
        $registry['eur'] = array($item['currency'],$item['last'],$item['arrow']);
    endif;
    if($item['name'] == 'GBP'):
        $registry['gbp'] = array($item['currency'],$item['last'],$item['arrow']);
    endif;
endforeach;

$str = json_encode($registry['currency']);
$str = preg_replace_callback(
    '/\\\\u([0-9a-f]{4})/i',
    function ($matches) {
        $sym = mb_convert_encoding(
            pack('H*', $matches[1]),
            'UTF-8',
            'UTF-16'
        );
        return $sym;
    },
    $str
);
$registry['currency'] = $str;

//echo $registry['currency'];