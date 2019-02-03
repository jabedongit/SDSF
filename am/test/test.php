<html>
<head></head>
<body>

<form action="test_process.php" method="GET">
<?php
for ($i=0; $i<3;$i++)
{
?>
Name of Person Number <?php echo $i;?> <input type="text" name="name[]"><br>
<?php
}
?>
<input type="submit" value="submit">
</form>





</body></html>