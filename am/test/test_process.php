<?php

echo "<h2>Names are</h2>";
echo count($_GET['name'])."<br>";
for ($i=0;$i< count($_GET['name']);$i++)

{
$nameArray= $_GET['name'];

echo $_GET['name'][$i]."<br>";
}



?>