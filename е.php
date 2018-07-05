<?php



function date2html($str='now'){ /*Виводимо дату*/
    static $month_ukr = array('січень',
        'лютий','березень','квітень','травень','червень',
        'липень','серпень','вересень','жовтень','листопад',
        'грудень');
    $str=strtotime($str);
    return $month_ukr[intval(date("m",$str)-1)];
}
echo date2html();
?>