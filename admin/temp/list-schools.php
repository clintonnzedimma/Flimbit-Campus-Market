<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';
Admin::protectPage();


?>
<!DOCTYPE html>
<html>
<head>
	<title>List of Schools</title>
	<style>

		tr:nth-child(even) {
			background: #ccc  ;
		}
		td{
		    padding: 15px;			
		}
	</style>
</head>
<body>
<center>
<table>
	<tr>
		<th>id</th>
		<th>Acronym</th>
		<th>Name</th>
		<th>State</th>
		<th>Date Added</th>
		<th>Time Added</th>
		<th></th>
	</tr>

<?php foreach (School_Factory::listAssoc() as $data): ?>
	<tr>
		<td><?=$data['id'] ?></td>
		<td><?=$data['acronym'] ?></td>
		<td><?=$data['name'] ?></td>
		<td><?=$data['state'] ?></td>
		<td><?=$data['date_of_add'] ?></td>
		<td><?=$data['time_of_add'] ?></td>
		<td><a href="edit-school.php?id=<?=$data['id'] ?>">Edit</a></td>
	</tr>	
<?php endforeach ?>


<!-- 	<tr>
		<td>2</td>
		<td>Uniben</td>
		<td>University Of Benin</td>
		<td>Edo</td>
		<td>09-10-2018</td>
		<td>edit</td>
	</tr> -->
</table>
</center>
</body>
</html>