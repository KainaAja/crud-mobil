<?php

include 'layout/header.php';
?>
<?php
$id = $_GET['id_mobil'];
echo $id;
$query = select("SELECT * FROM daftar WHERE ID_MOBIL=$id");

if(isset($_POST['update'])){
    if (update_daftar($_POST) > 0){
        echo "<script>
                alert('Data Berhasil Diubah');
                document.location.href = 'isi.php';
              </script>";
    }else{
        echo "<script>  
                alert('Data Gagal Diubah');
                document.location.href = 'isi.php';
              </script>";
    }

}

while($daftar = mysqli_fetch_array($query))
{
    $type = $daftar['TYPE_MOBIL'];
    $rating = $daftar['RATING'];
    $harga = $daftar['HARGA'];
    $deskripsi = $daftar['DESKRIPSI'];
    $foto = $daftar['FOTO'];
}

?>


    <div class="bg">
    <video autoplay loop muted>
        <source src="pexels-erik-mclean-9150557 (2160p).mp4">
    </video>
	</div>
    <div class="box">
    <form method="post" enctype="multipart/form-data" name="edit_daftar" class="input-data" >
    <p class="header-text" style="font-size: 2rem; font-weight: 800;">EDIT DATA</p>
    <div class="input-group">
        <input type="file" name="foto" placeholder="Foto" class="rounded-pill" class="custom-file-upload" >
        <p >
            <big class="gambar-sebelumnya"> Gambar Sebelumnya :</big>
            <img src="asset/<?php echo $foto ?>" width="120px" heigh="120px">
        </p>
        <input type="text" name="type_mobil" placeholder="Type mobil" class="rounded-pill"  value="<?php echo $type; ?>" required>
        <input type="text" name="rating" placeholder="Rating" class="rounded-pill" value="<?php echo $rating; ?>" required>
        <input type="text" name= "harga" placeholder="Harga" class="rounded-pill" value="<?php echo $harga; ?>" required>
        <input type="text" name="deskripsi" placeholder="Deskripsi" class="rounded-pill" value="<?php echo $deskripsi; ?>" required>
        <input type="hidden" name="id_mobil" value="<?php echo $_GET['id_mobil']; ?>" >
        <input type="hidden" name="fotolama" value="<?php echo $foto; ?>">
        <button style="width: 100%; padding:15px 20px; background: #f7316c; color: #FFF; " type="submit" name="update" value="UPDATE" class="border border-primary rounded-pill border border-danger">Berubah</button>
    </div>
</form>

</div>
</body>
</html>