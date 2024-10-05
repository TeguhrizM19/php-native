<?php
require 'function.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = $id");

if (isset($id) > 0) {
	echo "<script>
			alert('data berhasil dihapus');
			document.location.href='index.php';
		</script>";
} else {
	echo "<script>
			alert('data gagal dihapus');
			document.location.href='index.php';
		</script>";
	}
?>