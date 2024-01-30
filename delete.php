<?php 

    include 'config/app.php';

    $id = $_GET['id_mobil'];

    if (delete_daftar($id) > 0){
        echo "<script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'isi.php';
              </script>";
    }else{
        echo "<script>  
                alert('Data Gagal Dihapus');
                document.location.href = 'isi.php';
              </script>";
    }

   
?>