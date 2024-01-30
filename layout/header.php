<?php
    include 'config/app.php';
    
    $query = select("SELECT * FROM daftar ");   
?>
<?php

include 'config/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styleindex.css" type="text/css" main>
    <title>Daftar Harga Mobil Toyota</title>
</head>
<body>
    <header>
    <div class="backnav">
    <h2 class="judul-crud"> CRUD PHP</h2>
    <nav class="active" id="nav">
        <ul>
            <li><a href="isi.php">HOME</a></li>
            <li><a href="tambah.php">TAMBAH</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#kontak">CONTACT</a></li>
        </ul>
        <button class="icon" id="toggle">
            <div class="line line1"></div>
            <div class="line line2"></div>
        </button>   
    </nav>
    </div>
    
    <div class="profile" onmouseover="showDropdown()" onmouseout="hideDropdown()">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <div class="profile-trigger" >
        <button class="dropbtn"><i class="fa fa-caret-down" aria-hidden="true"></i></button>
        <div class="dropdown-content" id="dropdownContent" >
            <a href="update_profile.php">Update Profile</a>
            <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">Logout</a>

        </div>
    </div>
    </div>
    <script src="script/scriptindex.js"></script>
    </header>