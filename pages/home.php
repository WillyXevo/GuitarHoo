<?php if(!isset($_GET['cari'])): ?>
<div class="container-fluid header-main">
	<img src="assets/img/GuitarHoo_Logo.png" alt="logo">
  	<!-- <h1><span class="color-yellow">O</span>PMANGA</h1> -->
</div>
<form class="form-inline" method="GET" action="index.php">
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control inp-cari" id="cari" name="cari" placeholder="Cari">
            <div class="input-group-addon iga-cari">
                <button type="submit" class="btn btn-default "><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="auto_complete_box">
            <div class="hasil_cari_list">
                
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
	
        
        $("#cari").keyup(function(){
            var val = $(this).val();
            //console.log(val);
            $(".auto_complete_box").show();
            $(".hasil_cari_list").load('pages/autocomplete.php?cari='+encodeURIComponent(val));
        });
        $("body").blur(function(){
            $(".auto_complete_box").hide();
        });
</script>
<?php else: ?>
    <div class="row">
        <div class="col-xs-12 panel-head">
            <h4>Hasil Pencarian untuk '<strong><?= $_GET['cari']; ?></strong>' </h4>
        

        
                <?php
                    $cari = htmlspecialchars($_GET['cari']);

                    $rows = $db->query("SELECT COUNT(*) as count FROM tblsong WHERE nama_artist LIKE '%$cari%' OR judul_lagu LIKE '%$cari%'");
                    $row = $rows->fetchArray();
                    $numRows = $row['count'];
                    if($numRows == 0){
                        echo "<p class=\"not-found\">Pencarian untuk '<strong>$cari</strong>' tidak ditemukan!</p>";
                    }else{
                        echo "<p class=\"not-found\"> $numRows data ditemukan!</p>";

                    $sql = "SELECT * FROM tblsong WHERE nama_artist LIKE '%$cari%' OR judul_lagu LIKE '%$cari%'";
                    $res = $db->query($sql);
                ?>
        </div>
        <div class="col-xs-12 hasil_cari_list">
            <ul>      
                <?php
                    while ($row = $res->fetchArray()):
                        $tag = strtoupper(substr($row['nama_artist'], 0, 1));
                ?>
                <a href="index.php?p=artist&tag=<?= $tag; ?>&band=<?= base64_url_encode($row['nama_artist']); ?>&lagu=<?= $row['id_song']; ?>">
                    <li>
                        <div class="icon_left">
                            <i class="fa fa-file-text-o fa-2x"></i>
                        </div>
                        <span>Chord <?= $row['nama_artist']; ?></span>
                        <p><?= $row['judul_lagu']; ?></p>
                    </li>
                </a>
              <?php endwhile; } ?>
            </ul>
        </div>
    </div>
    <br><br>
<?php endif; ?>