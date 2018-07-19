
<!DOCTYPE html>
<html lang="ua">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>БЛОГ</title>

    <!-- Bootstrap core CSS -->
    <link href="http://blog.vodokanal.te.ua/tpl/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="http://blog.vodokanal.te.ua/tpl/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="http://blog.vodokanal.te.ua/tpl/css/clean-blog.min.css" rel="stylesheet">



    <script src="http://blog.vodokanal.te.ua/core/script.js"></script>
    <script src="../js/script.js"></script>

</head>

<body>



</body>

</html>














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