<link rel="stylesheet" href="assets/css/dataTables.material.min.css">
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.material.min.js"></script>
<script type="text/javascript" src="lib/chord.js"></script>
<style>
	.frm-cari-chrd{
		border-bottom: 2px solid #ddd;	
	}
	.dataTables_length, .dataTables_filter{
		display: none;
	}
	div.dataTables_wrapper div.dataTables_paginate{
		text-align: center;
	}
	#tblchord>tbody>tr>td, #tblchord>thead>tr>th{
		font-size: 16px;
	}
	#tblchord>thead>tr{
		background: #f9f9f9;
	}
	.mdl-button{
		display: inline-block;
	    padding: 6px 8px;
	    margin-bottom: 0;
	    font-size: 14px;
	    line-height: 1.42857143;
	    text-align: center;
	    white-space: nowrap;
	    vertical-align: middle;
	    -ms-touch-action: manipulation;
	    touch-action: manipulation;
	    cursor: pointer;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	    background-image: none;
	    border: 1px solid transparent;

	    color: #fff;
    	background-color: #337ab7;
    	border-color: #2e6da4;
	}
	
	.mdl-button.disabled{
		pointer-events: none;
		cursor: not-allowed;
		filter: alpha(opacity=65);
		-webkit-box-shadow: none;
		box-shadow: none;
		opacity: .65;
	}
	.mdl-button.mdl-button--raised{
		background: #FFF;
		color: #000;
	}
	
	.name-chord{
		margin: 0;
		font-weight: 900;
		margin-bottom: 10px;
	}
</style>
	<div class="row">
		<div class="col-xs-12 text-center canvas-chord" style="display:none;">
			
			<canvas class="chord" id="chord-canvas" width="200px" height="500px"  style="border:1px solid #000000;"></canvas>
		</div>
		<div class="col-xs-12">
			<br><br>	
			<div class="panel panel-primary" style=" ">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Chord List</h3>
			  	</div>
			  	<div class="panel-body">
			    	<form class="frm-cari-chrd">
					  	<div class="form-group">
						    <input type="text" class="form-control" id="cari" placeholder="Cari...">
					  	</div>
					</form>
					<table class="table table-hover" id="tblchord">
						<thead>
							<tr>
								<th>Chord</th>
							</tr>
						</thead>
						<tbody class="tchord">
							<?php
								$sql = "SELECT * FROM tblkey ORDER BY 2, 3 ASC";
								$res = $db->query($sql);
								$i=0;
								while ($row = $res->fetchArray()) {
							?>
								<tr class="tr-key" onclick="show_chord(this)" id="tr-<?= ++$i; ?>" data-shape="<?= $row[3]; ?>" data-txt="<?= $row[2]; ?>">
									
									<td class="chord_txt"><?= $row[2]; ?></td>
								</tr> 
							<?php
								}
							?>
						</tbody>
					</table>
			  	</div>
			</div>
		</div>
		
	</div>

<script type="text/javascript">
<?php

echo "var chord_data = [";
$sql = "SELECT * FROM tblkey ORDER BY 2, 3 ASC";
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
</script>
<script type="text/javascript">
    $(document).ready(function(){
		//$(".tchord").append();
		var tblchrd = $('#tblchord').DataTable( {
	    	"pageLength": 20,
	        "ordering": false,
	        "language": {
				"paginate": {
					"previous": '<i class="fa fa-fw fa-angle-left">',
					"next": '<i class="fa fa-fw fa-angle-right">',
				}
			}
	    });

	    $("#cari").keyup(function(){
	    	var v = $(this).val();
	    	tblchrd.search(v).draw();
	    });

    });	

	function show_chord(ini){
		var shape = $(ini).attr("data-shape");
    	var c_txt = $(ini).attr("data-txt");
    	console.log(shape);
    	console.log(c_txt);
    	$(".canvas-chord").show(200);

    	$(".canvas-chord").html('');
    	$(".canvas-chord").append('<h4>Chord Diagram</h4>');
    	$(".canvas-chord").append('<h3 class="name-chord">'+c_txt+'</h3>');
    	$(".canvas-chord").append('<canvas class="chord" id="chord-canvas" width="200px" height="500px"  style="border:1px solid #000000;"></canvas>');
    	var c = document.getElementById("chord-canvas");
		var ctx=c.getContext("2d");
		ctx.clearRect(0, 0, 200, 500);
		gem_gitar(ctx);	
		draw_chord(ctx, shape);
		//window.scrollTo(0 ,0);
		$('html, body').animate({
	        scrollTop: 0
	      	}, 500);
	}
</script>