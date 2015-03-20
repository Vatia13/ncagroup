<?php
if($_REQUEST['cron'] == 'fqkfdbe22'):
    @include('config.php');
    $url = "http://www.nbg.ge/rss.php";
    $doc = new DOMDocument('1.0', 'UTF-8');
    if($doc->load($url)){
        $destinations = $doc->getElementsByTagName("description");
        $output = "";
        foreach ($destinations as $destination) {
            foreach($destination->childNodes as $child) {
                if ($child->nodeType == XML_CDATA_SECTION_NODE) {
                    $output .= $child->textContent;
                }
            }
        }

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
        </head>
        <body>
        <?php
        $out = str_replace('<td>',"'",$output);
        $out = str_replace('<img  src="https://www.nbg.gov.ge/images/green.gif">',"0",$out);
        $out = str_replace('<img  src="https://www.nbg.gov.ge/images/red.gif">',"1",$out);
        $out = str_replace('</td>',"',",$out);
        $out = str_replace('</tr><tr>',")(",$out);
        $out = str_replace('<tr>',"",$out);
        $out = str_replace('</tr>',"",$out);
        $out = str_replace('<table border="0">','',$out);
        $out = str_replace('</table>','',$out);
        $out = explode(")(",$out);
        $array = array();
        for($i=0;$i<=count($out);$i++){
            $ar = @explode(',',$out[$i]);
            for($a=0;$a<count($ar) - 1;$a++){
                $array[$i][$a] = str_replace("'","",$ar[$a]);
            }

        }


        foreach($array as $item):

            $row = mysql_fetch_assoc(mysql_query("SELECT id FROM is_currency WHERE name='".trim($item[0])."' LIMIT 1"));

            if($row['id'] > 0){
                mysql_query("UPDATE is_currency SET currency='".floatval($item[2])."',arrow='".intval($item[3])."',last='".floatval($item[4])."' WHERE id='".$row['id']."'");
            }else{
                mysql_query("INSERT INTO is_currency (title,name,currency,arrow,last) VALUES ('".trim($item[1])."','".trim($item[0])."','".floatval($item[2])."','".intval($item[3])."','".floatval($item[4])."')");
            }


        endforeach;

        ?>
        </body>
        </html>
    <?php }
endif;
?>