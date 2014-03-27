<html>
<body>
	<form action="<?php echo Yii::app()->baseUrl; ?>/api.php/daftar/create" method="post" enctype="multipart/form-data">
		judul : <input type="text" name="judul"> <br>
		gambar : <input type="file" name="gambar"> <br>
		zip : <input type="file" name="zip"> <br>
		<input type="submit" />s  
	</form>
</body>
</html>