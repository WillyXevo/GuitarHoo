<?php

include "../curl/function.php";
    
    $db = new SQLite3('../db_chord.db');

    if(!$db) {
        echo $db->lastErrorMsg();
    }

    if(isset($_GET['cari'])){
        $cari = htmlspecialchars($_GET['cari']);

        $rows = $db->query("SELECT COUNT(*) as count FROM tblsong WHERE nama_artist LIKE '%$cari%' OR judul_lagu LIKE '%$cari%'");
        $row = $rows->fetchArray();
        $numRows = $row['count'];
        if($numRows == 0){
            echo "<p class=\"not-found\">Pencarian untuk '<strong>$cari</strong>' tidak ditemukan!</p>";
        }else{
            echo '<ul>';
            $sql = "SELECT * FROM tblsong WHERE nama_artist LIKE '%$cari%' OR judul_lagu LIKE '%$cari%' ";
            $res = $db->query($sql);
            while ($row = $res->fetchArray()) {
                $art = preg_replace('/'.$cari.'/i', '<b>$0</b>', $row['nama_artist']);
                $jd = preg_replace('/'.$cari.'/i', '<b>$0</b>', $row['judul_lagu']);
                $tag = strtoupper(substr($row['nama_artist'], 0, 1));

?>
            <a href="index.php?p=artist&tag=<?= $tag; ?>&band=<?= base64_url_encode($row['nama_artist']); ?>&lagu=<?= $row['id_song']; ?>">
                <li>
                    <div class="icon_left">
                        <i class="fa fa-file-text-o fa-2x"></i>
                    </div>
                    <span>Chord <?= $art; ?></span>
                    <p><?= $jd; ?></p>
                </li>
            </a>
<?php  
            }
            echo '</ul>';
        }
    }
?>


<!-- <ul>
    <a href="index.php">
        <li>
            <div class="icon_left">
                <i class="fa fa-file-text-o fa-2x"></i>
            </div>
            <span>Chord Dewa</span>
            <p>Kosong</p>
        </li>
    </a>
</ul> -->