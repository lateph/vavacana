<html>
<body>
	<form action="<?php echo Yii::app()->baseUrl; ?>/api.php/daftar/create" method="post" enctype="multipart/form-data">
		judul : <input type="text" name="judul"> <br>
		deskripsi : <input type="text" name="diskripsi"> <br>
		gambar : <input type="file" name="gambar"> <br>
		zipIOS : <input type="file" name="zipIOS"> <br>
		zipAndroid : <input type="file" name="zipAndroid"> <br>
		<input type="submit" />s  
	</form>
</body>
</html>