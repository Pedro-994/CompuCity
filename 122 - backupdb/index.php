<?php
if ($_POST)
{
	if ($_POST["backup"])
	{
		require("backup.php");
		$backupdb = new backupdb();
		echo "<a href='{$backupdb->getRuta()}'>Descargar archivo .sql</a>";
	}
}
?>
<form method="post">
	<input type="hidden" value="true" name="backup">
	<input type="submit" value="Realizar copia de respaldo.">
</form>