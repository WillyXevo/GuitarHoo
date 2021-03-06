<script type="text/javascript" src="lib/chord.js"></script>

<?php
	$tag = "A";
	if(isset($_GET['tag'])){
		$tag = $_GET['tag'];
	}
	if(isset($_GET['band'])){
		$band = base64_url_decode($_GET['band']);
	}
	if(isset($_GET['lagu'])){
		$id_song = $_GET['lagu'];
		$sql = "SELECT * FROM tblsong WHERE id_song = '$id_song'";
		$res = $db->query($sql);
		$row_lagu = $res->fetchArray();
	}
?>
<div class="row well" id="lst-artist">
	<div class="col-xs-12 artist-link">
		<p><strong>BROWSE ARTIST : </strong><br>
		<?php
			$abc = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P", "Q","R","S","T","U","V","W","X","Y","Z"];
			for($a = 0; $a<count($abc); $a++){
				if($abc[$a] == $tag){
					echo "<a href='index.php?p=artist&tag=$abc[$a]' style='text-decoration:underline;' >$abc[$a]</a>";
				}else{
					echo "<a href='index.php?p=artist&tag=$abc[$a]'>$abc[$a]</a>";
				}
			}
		?>
		</p>
	</div>
</div>
<ol class="breadcrumb">
  	<li><a href="index.php">Artist</a></li>
  	<?php
  		if(isset($tag) && !isset($_GET['band']) && !isset($_GET['lagu']) ):
  	?>
  	<li class="active"><?= $tag; ?></li>
  	<?php
  		elseif(isset($_GET['tag']) && isset($_GET['band']) && !isset($_GET['lagu']) ):
  	?>
  	<li><a href="index.php?p=artist&tag=<?= $tag?>"><?= $tag?></a></li>
  	<li class="active"><?= $band; ?></li>
  	<?php
  		elseif(isset($_GET['tag']) && isset($_GET['band']) && isset($_GET['lagu']) ):
  	?>

  	<li><a href="index.php?p=artist&tag=<?= $tag; ?>"><?= $tag?></a></li>
  	<li><a href="index.php?p=artist&tag=<?= $tag; ?>&band=<?= base64_url_encode($band); ?>"><?= $band?></a></li>
  	<li class="active"><?= $row_lagu['judul_lagu']; ?></li>
  	<?php
  		endif;
  	?>
</ol>
<?php
	if(isset($tag) && !isset($_GET['band']) && !isset($_GET['lagu']) ):
?>
<div class="container container-artist">
	<section id="<?= $tag; ?>">
		<h2><?= $tag; ?></h2>
		<?php
			$sql = "SELECT DISTINCT nama_artist FROM tblsong WHERE substr(nama_artist, 1, 1) = '$tag'";
			$res = $db->query($sql);
			while ($row = $res->fetchArray()) {
			    echo "<a href='index.php?p=artist&tag=$tag&band=".base64_url_encode($row['nama_artist'])."' class='list-artist'>{$row['nama_artist']}</a>";
			}
		?>
	</section>
</div>

<?php
	elseif(isset($_GET['tag']) && isset($_GET['band']) && !isset($_GET['lagu']) ):
?>
<div class="row">
	<div class="col-xs-12 panel-head">
		<p>CHORDS FROM '<strong><?= $band; ?></strong>' </p>
	</div>
	<div class="col-xs-12 hasil_cari_list">
		<ul>
			<?php
				$sql = "SELECT * FROM tblsong WHERE nama_artist = '$band'";
				$res = $db->query($sql);
				while ($row = $res->fetchArray()):
			?>
			<a href="index.php?p=artist&tag=<?= $tag; ?>&band=<?= base64_url_encode($band); ?>&lagu=<?= $row['id_song']; ?>">
		    	<li>
		    		<div class="icon_left">
		    			<i class="fa fa-file-text-o fa-2x"></i>
		    		</div>
		    		<span>Chord <?= $band; ?></span>
		    		<p><?= $row['judul_lagu']; ?></p>
		    	</li>
		  	</a>
		  <?php endwhile; ?>
		</ul>
	</div>
</div>

<?php
	elseif(isset($_GET['tag']) && isset($_GET['band']) && isset($_GET['lagu']) ):
?>
<div class="row" id="isi-chord">
	<div class="col-xs-12">
		<?php
			/*$user = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			$ids = $row_lagu['id_song'];
			$da = date("Y-m-d H:i:s");
			$sql = "INSERT INTO tblhistory (user, id_song, date_access) VALUES ('$user', $ids, '$da')";
			$db->exec($sql);*/
		?>
		<h3>CHORD <?= strtoupper($row_lagu['judul_lagu']); ?></h3>
		<br>
		<?= html_entity_decode($row_lagu['isi_lagu']); ?>
	</div>
</div>

<div class="chord-control" id="myBffix">
	<p class="btn">Transpose</p>
	<button type="button" class="btn" id="tr-min">-</button>
	<button type="button" class="btn" id="tr-max">+</button>
	<p class="btn">Font Size</p>
	<button type="button" class="btn" id="fz-min">-</button>
	<button type="button" class="btn" id="fz-max">+</button>
</div>

<script type="text/javascript">
    var height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
    var trans_chord = ["C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B"];
    $(document).ready(function(){
			
		$("#fz-max").click(function(){
			var pfz = $('.thebody').css('font-size').replace("px", "");
			pfz = parseInt(pfz, 10) + 2;
			$(".thebody").css("font-size", pfz+"px");
		});

		$("#fz-min").click(function(){
			var pfz = $('.thebody').css('font-size').replace("px", "");
			pfz = parseInt(pfz, 10) - 2;
			$(".thebody").css("font-size", pfz+"px");
		});

		$("#tr-max").click(function(){
			$(".showTip").each(function(i){
				var ke = $(this).attr("class").split(" ");
				var k = ke[1];
				var ext = '';

				if(k[1]!="#"){
					k = k[0];
					ext = ke[1].replace(k, "");
				}else{
					k = k[0]+k[1];
					ext = ke[1].replace(k, "");
				}

				/*if(ke[1].indexOf("m")>-1){
					k = ke[1].split("m")[0];
					ext += 'm'+ke[1].split("m")[1];
				}else if(ke[1].indexOf("Maj")>-1){
					k = ke[1].split("Maj")[0];
					ext += 'Maj'+ke[1].split("m")[1];
				}else if(k[1]=='7' || k[1]=='9' || k[1]=='11' || k[1]=='13'){
					ext = k[1];
					k = k[0];
				}else if(k[2]=='7' || k[2]=='9' || k[2]=='11' || k[2]=='13'){
					ext = k[2];
					k = k[0]+k[1];
				}*/

				var transpose = transpose_plus(k)+ext;
				$(this).removeClass(ke[1]);
				$(this).addClass(transpose);
				$(this).html(transpose);
			});
			
		});

		$("#tr-min").click(function(){
			$(".showTip").each(function(i){
				var ke = $(this).attr("class").split(" ");
				var k = ke[1];
				var ext = '';
				if(k[1]!="#"){
					k = k[0];
					ext = ke[1].replace(k, "");
				}else{
					k = k[0]+k[1];
					ext = ke[1].replace(k, "");
				}
				var transpose = transpose_min(k)+ext;
				$(this).removeClass(ke[1]);
				$(this).addClass(transpose);
				$(this).html(transpose);
			});
		});

    	$(window).scroll(function(){
    		var scrollPos = $(document).scrollTop();
    		var allh = $("#isi-chord").height() - $("#lst-artist").height() - $(".breadcrumb").height() - (height-300) - 50;
    		if(scrollPos>=allh){
    			$(".chord-control").addClass("bfix");
    		}else{
    			$(".chord-control").removeClass("bfix");
    		}
    	});
    });

	function transpose_plus(key){
		var trans = 0;
		
		for(var i = 0; i < trans_chord.length; i++){
			if(key == trans_chord[i]){
				trans = i;
				trans++;
				if(trans>=trans_chord.length){
					trans=0;
				}
			}
		}
		return trans_chord[trans];
	}

	function transpose_min(key){
		var trans = 0;
		
		for(var i = 0; i < trans_chord.length; i++){
			if(key == trans_chord[i]){
				trans = i;
				trans--;
				if(trans<=0){
					trans=trans_chord.length-1;
				}
			}
		}
		return trans_chord[trans];
	}
</script>



<div class="modal fade" id="modal_chord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog" >
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Chord title</h4>
	      	</div>
	      	<div class="modal-body canvas-chord">
				
	      	</div>
	      	
	    </div>
  	</div>
</div>



<script type="text/javascript">
   	
<?php

echo "var chord_data = [";
$sql = "SELECT * FROM tblkey";
$res = $db->query($sql);
$i=0;
while ($row = $res->fetchArray()) {
	if($i==0){
		echo "[\"$row[0]\", \"$row[1]\", \"$row[2]\", \"$row[3]\"]";
	}else{
		echo ", [\"$row[0]\", \"$row[1]\", \"$row[2]\", \"$row[3]\"]";
	}
	$i++;
}
echo "];";
?>
	$(document).ready(function(){
		
    	$(".showTip").click(function(){
    		var clss = $(this).attr("class");
    		var chrd = clss.split(" ")[1];
    		//console.log(chrd);
    		$('#modal_chord').modal('show');
    		$("#myModalLabel").html("Chord "+chrd);
    		$(".canvas-chord").html("");
			var sha = get_shape(chrd);
			console.log(sha);
			$(".canvas-chord").html('<canvas class="chord" id="chord" width="300px" height="100px"  style="border:1px solid #000000;"></canvas>').promise().done(function(){
				var c = document.getElementById("chord");
				var ctx=c.getContext("2d");
				gem_gitar2(ctx);	
				draw_chord2(ctx, sha);
			});
    		return false;
    	});
    });
    function get_shape(chrd) {
    	for(var i=0; i<chord_data.length; i++){
    		if(chord_data[i][2]==chrd){
    			return chord_data[i][3];
    		}
    	}
    	return "xxxxxx";
    }
</script>

<?php
	endif;
?>