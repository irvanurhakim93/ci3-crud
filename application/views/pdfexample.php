
<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter 3</title>
</head>
<body>


<h1>Info murid</h1>
<?php
$no = 1;
foreach($murid as $m)
{
?>
<table style="border:1px solid red;width:100%;">
	<tr>
		<th style="border:1px solid red">Name</th>
		<th style="border:1px solid red">Kelas</th>
	</tr>
	<tr>
		<td style="border:1px solid red"><?= $m->nama; ?></td>
		<td style="border:1px solid red"><?= $m->kelas; ?></td>
	</tr>
</table>
<?php } ?>

</body>
</html>
