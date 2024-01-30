<?php
function select($query)
    {
        global $mysqli;
            
        $result = mysqli_query($mysqli, $query);
        return $result;
    }
    
function create_daftar($post)
{
        global $mysqli;
        
        $foto = upload_file();
        $id = $post['id_mobil'];
        $type = $post['type_mobil'];
        $rating = $post['rating'];
        $harga = $post['harga'];
        $deskripsi = $post['deskripsi'];
        
        $query = "INSERT INTO daftar(FOTO, ID_MOBIL, TYPE_MOBIL, RATING, HARGA, DESKRIPSI) 
                VALUES('$foto','$id','$type','$rating','$harga','$deskripsi')";
            
        if (mysqli_query($mysqli, $query)) {
                return true;
        } else {
                return false;
        }
}

function update_daftar($post)
{
    global $mysqli;
        
    $id = $post['id_mobil'];
    $type = $post['type_mobil'];
    $rating = $post['rating'];
    $harga = $post['harga'];
    $deskripsi = $post['deskripsi'];
    $fotolama = $post['fotolama'];

    // Periksa apakah ada foto baru yang diunggah
    if ($_FILES['foto']['error'] == 4) {
        // Jika tidak ada foto baru diunggah, gunakan foto lama dari input tersembunyi
        $foto = $fotolama;
    } else {
        // Hapus foto lama dari folder penyimpanan
        unlink('asset/' . $fotolama);

        // Upload foto baru
        $foto = upload_file();
    }

    $query = "UPDATE daftar SET TYPE_MOBIL='$type',RATING='$rating',HARGA='$harga',DESKRIPSI='$deskripsi',FOTO='$foto' WHERE ID_MOBIL=$id";
    
    if (mysqli_query($mysqli, $query)) {
        return true;
    } else {
        return false;
    }
}

function upload_file()
{
    $namafile   = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpname    = $_FILES['foto']['tmp_name'];

    $extensifilevalid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namafile);
    $extensifile      = strtolower(end($extensifile));

    if(!in_array($extensifile, $extensifilevalid)){
        echo "<script>
                alert('Format file tidak valid');
                document.location.href = 'isi.php';
              </script>";
        die();
    }
    if($ukuranfile > 2048000){
        echo "<script>
                alert('Ukurran file max 2mb');
                document.location.href = 'isi.php';
              </script>";
        die();
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $extensifile;

    move_uploaded_file($tmpname, 'asset/'. $namafilebaru);
    return $namafilebaru;

}
        


function delete_daftar($id)
{
    global $mysqli;

    $id = $_GET['id_mobil'];

    // Dapatkan nama file foto yang akan dihapus
    $result = select("SELECT FOTO FROM daftar WHERE ID_MOBIL=$id");
    $row = mysqli_fetch_assoc($result);
    $foto = $row['FOTO'];

    // Hapus file foto dari folder
    unlink('asset/' . $foto);

    // Hapus data dari database
    $query = "DELETE FROM daftar WHERE ID_MOBIL=$id";

    if (mysqli_query($mysqli, $query)) {
        return true;
    } else {
        return false;
    }
}
