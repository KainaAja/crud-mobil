 <<?php 
    include 'layout/header.php';
?>

<section class="product">  
    <div class="judul">
        <h1>DAFTAR HARGA TOYOTA</h1>
    </div>

    <div class="kotak-container">
        <?php while ($daftar = mysqli_fetch_assoc($query)) : ?>
            <div class="kotak">
                <div class="image">
                    <?php echo "<img src='asset/$daftar[FOTO]' width='200px' height'200px'>";?>
                    <div class="icons">
                    <button type="button" class="btn btn-primary border border-primary rounded-pill border border-success" data-bs-toggle="modal" data-bs-target="#modalViewData_<?php echo $daftar['ID_MOBIL']; ?>">
                        Detail
                    </button>
                    <!--detail-->
                    <div class="modal fade" id="modalViewData_<?php echo $daftar['ID_MOBIL']; ?>"  tabindex="-1" aria-labelledby="modalViewDataLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div style="flex-direction: column;" class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <h1 class="modal-title fs-5" id="modalViewDataLabel">TOYOTA</h1>
                            </div>
                            <div class="modal-body">
                                <?php echo "<img src='asset/$daftar[FOTO]' width='200px' height'200px'>";?>
                                <h3 style="padding-bottom:5px; padding-top:20px;"><?= $daftar['TYPE_MOBIL']; ?></h3>
                                <?= $daftar['RATING']; ?><i class="fa-solid fa-star" style="color: yellow;"></i>
                                <div class="deskripsi">
                                    <h3>Deskripsi</h3>
                                    <p><?= $daftar['DESKRIPSI']; ?></p>
                                </div>
                            </div>
                            <div style="flex-wrap:nowrap;" class="modal-footer">
                            <button style="width: 50%; padding:5px; background: #8feb34;" type="button" class="border border-primary rounded-pill border border-success">
                                <a style="text-decoration:none; color:#fff;" href='edit.php?id_mobil=<?= $daftar['ID_MOBIL'] ?>'>Edit</a>
                            </button>
                                <button style="width: 50%; padding:5px; background: #f7316c;" type="button" class="border border-primary rounded-pill border border-danger-subtle" ><a style="text-decoration:none; color:#fff;" href='delete.php?id_mobil=<?= $daftar['ID_MOBIL'] ?>'>Delete</a></button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!--end-->
                </div>
                <div class="content">
                    <h3><?= $daftar['TYPE_MOBIL']; ?></h3>
                    <div class="price">&nbsp IDR <?= number_format($daftar['HARGA'],0,',','.'); ?>  </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section> 



   <?php 
    include 'layout/footer.php'
   ?>