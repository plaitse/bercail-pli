<?php
$temp = "";
$row = 1;
if (($handle = fopen("zip-before2.csv", "r")) !== FALSE) {
    // $fp = fopen('output.csv', 'w');
    while (($data = fgetcsv($handle, 100000, ";")) !== FALSE) {
        $num = count($data);
        // echo "<p> $num champs à la ligne $row: <br /></p>\n";
        $row++;
        // for ($c=0; $c < $num; $c++) {
        //     echo $data[$c] . "<br />\n";
        // }
        echo '"'.$data[0].'" => "'.$data[4].' - '.$data[1].' - '.$data[2].' - '.$data[3].'"<br />';
        // if ($data[0] == $temp)
        // {
        //     echo "<p>Cette ligne est un doublon avec la précedente</p>";
        // }
        // else
        // {
        //     fputcsv($fp, $data);
        // }

        $temp = $data[0];
    }
    fclose($handle);
    // fclose($fp);
}
?>