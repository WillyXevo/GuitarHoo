
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	<link rel="stylesheet" href="lib/datatables/css/dataTables.material.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


	<script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="lib/datatables/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="lib/datatables/js/dataTables.material.js"></script>

		

	<div class="container">
		<div class="row">
			<div class="col-xs-12"><br><hr><br></div>
		</div>
		<div class="row">
			<div class="col-xs-4 text-center canvas-chord">
				<canvas class="chord" id="chord" width="200px" height="500px"  style="border:1px solid #000000;"></canvas>
			</div>
			<div class="col-xs-8">
				<div class="panel panel-primary" style="height:500px;  ">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Chord List</h3>
				  	</div>
				  	<div class="panel-body">
				    	<form>
						  	<div class="form-group">
							    <input type="text" class="form-control" id="cari" placeholder="Cari...">
						  	</div>
						</form>
						<hr>
						<table class="table table-hover" id="tblchord">
							<thead>
								<tr>
									<th width="10%">No</th>
									<th>Chord</th>
								</tr>
							</thead>
							<tbody style="height:300px; overflow:scroll;" class="tbody">
								
								<!-- <tr class="tr" id="tr-<?= ++$i; ?>" data-shape="<?= $csv[3]; ?>">
									<td><?= $i; ?></td>
									<td class="chord_txt"><?= $csv[2]; ?></td>
								</tr> -->
							</tbody>
						</table>

						<div class="row">
							<div class="col-xs-12 text-right">
								<nav>
								  	<ul class="pagination">
									    <li class="disabled">
									      	<a href="#" aria-label="Previous">
									        	<span aria-hidden="true">&laquo;</span>
									      	</a>
									    </li>
									    <li>
									      	<a href="#" aria-label="Next">
									        	<span aria-hidden="true">&raquo;</span>
									      	</a>
									    </li>
								  	</ul>
								</nav>

							</div>
						</div>
				  	</div>
				</div>
			</div>
			
		</div>
	</div>
	
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="lib/pagination.js"></script>
	<script type="text/javascript">
		var chord_data = [["2","A","Am","x02210"],["3","A","A5","x022xx"],["4","A","A7","002223"],["5","A","A11","020223"],["6","A","A13","3x2422"],["7","A","A6","x02222"],["8","A","A6\/9","222222"],["9","A","A7\/6","x02022"],["10","A","A7b5","x01223"],["11","A","A7b9","x02323"],["12","A","A7sus4","x02233"],["13","A","A9","x02423"],["14","A","A9b5","x21223"],["15","A","Aadd9","x02420"],["16","A","Aaug","x03221"],["17","A","Adim","xx1212"],["18","A","Am6","x02212"],["19","A","Am7","x02213"],["20","A","Am9","x02413"],["21","A","Amaj7","x02224"],["22","A","Amaj9","x02421"],["23","A","Ammaj7","x02110"],["24","A","Asus4","x02230"],["25","B","B","x24442"],["26","B","Bm","x24432"],["27","B","B5","x244xx"],["28","B","B7","x21202"],["29","B","B11","222222"],["30","B","B13","221224"],["31","B","B6","224444"],["32","B","B6\/9","x21122"],["33","B","B7\/6","x2x244"],["34","B","B7b5","x2324x"],["35","B","B7b9","x21212"],["36","B","B9","221222"],["37","B","B9b5","x21221"],["38","B","Badd9","x4x442"],["39","B","Baug","3214xx"],["40","B","Bdim","xx0101"],["41","B","Bm6","x20132"],["42","B","Bm7","x24232"],["43","B","Bm9","220222"],["44","B","Bmaj7","x24342"],["45","B","Bmaj9","22132x"],["46","B","Bmmaj7","x20332"],["47","B","Bsus4","x24400"],["48","C","C","x32010"],["49","C","Cm","xx1013"],["50","C","C7","x32310"],["51","C","C11","xx3333"],["52","C","C6","x32210"],["53","C","C6\/9","x32233"],["54","C","C7\/6","x1221x"],["55","C","C7b5","xx2312"],["56","C","C7b9","x32323"],["57","C","C7sus4","xx3313"],["58","C","C9","332333"],["59","C","C9b5","x32332"],["60","C","Cadd9","x32030"],["61","C","Caug","x3211x"],["62","C","Cdim","xx1212"],["63","C","Cm6","x31213"],["64","C","Cm7","x31313"],["65","C","Cm9","x31333"],["66","C","Cmaj7","332000"],["67","C","Cmaj9","xx2433"],["68","C","Cmmaj7","x31003"],["69","C","Csus4","x33013"],["70","D","D","x00232"],["71","D","Dm","xx0231"],["72","D","D5","x0023x"],["73","D","D7","x00212"],["74","D","D11","xx2213"],["75","D","D6","xx0202"],["76","D","D7b5","2301xx"],["77","D","D7b9","xx1212"],["78","D","D9","443444"],["79","D","D9b5","xx2112"],["80","D","Daug","xx4332"],["81","D","Ddim","xx0101"],["82","D","Dm6","xx0201"],["83","D","Dm7","xx0211"],["84","D","Dm9","xx2211"],["85","D","Dmaj7","xx0222"],["86","D","Dmaj9","xx2222"],["87","D","Dmmaj7","xx0221"],["88","D","Dsus4","xx0233"],["89","E","E","022100"],["90","E","Em","022000"],["91","E","E5","022xxx"],["92","E","E7","020130"],["93","E","E11","222234"],["94","E","E13","020122"],["95","E","E6","022120"],["96","E","E6\/9","02x122"],["97","E","E7\/6","020120"],["98","E","E7b5","012130"],["99","E","E7b9","020101"],["100","E","E7sus4","022230"],["101","E","E9","022132"],["102","E","E9b5","012132"],["103","E","Eadd9","022102"],["104","E","Eaug","03211x"],["105","E","Edim","xx2323"],["106","E","Em6","022020"],["107","E","Em7","020030"],["108","E","Em9","022032"],["109","E","Emaj7","021100"],["110","E","Emaj9","022142"],["111","E","Emmaj7","x21000"],["112","E","Esus4","022200"],["113","F","F","133211"],["114","F","Fm","133111"],["115","F","F5","133xxx"],["116","F","F7","131241"],["117","F","F11","xx1313"],["118","F","F13","131233"],["119","F","F6","133231"],["120","F","F6\/9","13x233"],["121","F","F7\/6","1x123x"],["122","F","F7b5","xx1201"],["123","F","F7b9","xx1212"],["124","F","F7sus4","xx1311"],["125","F","F9","131213"],["126","F","F9b5","xx1203"],["127","F","Fadd9","x03213"],["128","F","Faug","xx3221"],["129","F","Fdim","xx0101"],["130","F","Fm6","133131"],["131","F","Fm7","131141"],["132","F","Fm9","xx1113"],["133","F","Fmaj7","132211"],["134","F","Fmaj9","xx2213"],["135","F","Fmmaj7","xx2111"],["136","F","Fsus4","xx3311"],["137","G","G","320003"],["138","G","Gm","xx0333"],["139","G","G5","xx0033"],["140","G","G7","320001"],["141","G","G11","x3323x"],["142","G","G13","322231"],["143","G","G6","320000"],["144","G","G6\/9","3x223x"],["145","G","G7\/6","xx3000"],["146","G","G7b5","xx3423"],["147","G","G7b9","x2313x"],["148","G","G7sus4","xx0011"],["149","G","G9","320201"],["150","G","Gadd9","3x0203"],["151","G","Gaug","xx1003"],["152","G","Gdim","xx2323"],["153","G","Gm6","x12333"],["154","G","Gm7","xx3333"],["155","G","Gm9","x13233"],["156","G","Gmaj7","3x443x"],["157","G","Gmaj9","x20232"],["158","G","Gmmaj7","x10032"],["159","G","Gsus4","xx0013"],["160","X","Disabled","xxxxxx"],["161","X","Open","000000"],["162","Ab","Ab","xx1114"],["163","Ab","Abm","xx1104"],["164","Ab","Ab5","xxx144"],["165","Ab","Ab7","xx1112"],["166","Ab","Ab11","xx1322"],["167","Ab","Ab13","2x1311"],["168","Ab","Ab6","xx1111"],["169","Ab","Ab6\/9","43334x"],["170","Ab","Ab7\/6","2x1111"],["171","Ab","Ab7b5","xx0112"],["172","Ab","Ab7b9","x01112"],["173","Ab","Ab7sus4","xx1122"],["174","Ab","Ab9","xx1312"],["175","Ab","Ab9b5","xx0312"],["176","Ab","Abaug","43211x"],["177","Ab","Abdim","xx0101"],["178","Ab","Abm6","xx1101"],["179","Ab","Abm7","xx4444"],["180","Ab","Abm9","x2434x"],["181","Ab","Abmaj7","xx1113"],["182","Ab","Abmaj9","x11113"],["183","Ab","Abmmaj7","xx1103"],["184","Ab","Absus4","xx1124"],["185","A#","Ab","x13331"],["186","A#","Abm","x13321"],["187","A#","Ab5","x133xx"],["188","A#","Ab7","113131"],["189","A#","Ab11","x11111"],["190","A#","Ab13","333334"],["191","A#","Ab6","113333"],["192","A#","Ab6\/9","x10011"],["193","A#","Ab7\/6","x1x133"],["194","A#","Ab7b5","x1213x"],["195","A#","Ab7b9","xx0101"],["196","A#","Ab7sus4","xx3344"],["197","A#","Ab9","110111"],["198","A#","Abaug","xx4332"],["199","A#","Abdim","xx2323"],["200","A#","Abm6","113323"],["201","A#","Abm7","113124"],["202","A#","Abm9","x4311x"],["203","A#","Abmaj7","x13231"],["204","A#","Abmaj9","x10211"],["205","A#","Abmmaj7","x03321"],["206","A#","Absus4","xx3341"],["207","Bb","Bb","x13331"],["208","Bb","Bbm","x13321"],["209","Bb","Bb5","x133xx"],["210","Bb","Bb7","113131"],["211","Bb","Bb11","x11111"],["212","Bb","Bb13","333334"],["213","Bb","Bb6","113333"],["214","Bb","Bb6\/9","x10011"],["215","Bb","Bb7\/6","x1x133"],["216","Bb","Bb7b5","x1213x"],["217","Bb","Bb7b9","xx0101"],["218","Bb","Bb7sus4","xx3344"],["219","Bb","Bb9","110111"],["220","Bb","Bbaug","xx4332"],["221","Bb","Bbdim","xx2323"],["222","Bb","Bbm6","113323"],["223","Bb","Bbm7","113124"],["224","Bb","Bbm9","x4311x"],["225","Bb","Bbmaj7","x13231"],["226","Bb","Bbmaj9","x10211"],["227","Bb","Bbmmaj7","x03321"],["228","Bb","Bbsus4","xx3341"],["229","C#","Cb","xx3124"],["230","C#","Cbm","4x212x"],["231","C#","Cb7","x4342x"],["232","C#","Cb11","xx4444"],["233","C#","Cb6","xx3324"],["234","C#","Cb6\/9","x43344"],["235","C#","Cb7\/6","x23324"],["236","C#","Cb7b5","xx3423"],["237","C#","Cb7b9","xx3434"],["238","C#","Cb7sus4","xx4424"],["239","C#","Cb9","443444"],["240","C#","Cb9b5","x43444"],["241","C#","Cbadd9","xx1121"],["242","C#","Cbaug","xx3221"],["243","C#","Cbdim","xx2323"],["244","C#","Cbm6","xx2324"],["245","C#","Cbm7","x42424"],["246","C#","Cbm9","xx2444"],["247","C#","Cbmaj7","x43111"],["248","C#","Cbmaj9","xx1111"],["249","C#","Cbmmaj7","x32120"],["250","C#","Cbsus4","xxx122"],["251","Db","Db","xx3124"],["252","Db","Dbm","4x212x"],["253","Db","Db7","x4342x"],["254","Db","Db11","xx4444"],["255","Db","Db6","xx3324"],["256","Db","Db6\/9","x43344"],["257","Db","Db7\/6","x23324"],["258","Db","Db7b5","xx3423"],["259","Db","Db7b9","xx3434"],["260","Db","Db7sus4","xx4424"],["261","Db","Db9","443444"],["262","Db","Db9b5","x43444"],["263","Db","Dbadd9","xx1121"],["264","Db","Dbaug","xx3221"],["265","Db","Dbdim","xx2323"],["266","Db","Dbm6","xx2324"],["267","Db","Dbm7","x42424"],["268","Db","Dbm9","xx2444"],["269","Db","Dbmaj7","x43111"],["270","Db","Dbmaj9","xx1111"],["271","Db","Dbmmaj7","x32120"],["272","Db","Dbsus4","xxx122"],["273","D#","Db","3x134x"],["274","D#","Dbm","xx4342"],["275","D#","Db5","xx134x"],["276","D#","Db7","xx1323"],["277","D#","Db11","xx3324"],["278","D#","Db6","xx1313"],["279","D#","Db6\/9","x11011"],["280","D#","Db7b5","xx1223"],["281","D#","Db7b9","xx2323"],["282","D#","Db7sus4","xx1324"],["283","D#","Db9","xx3323"],["284","D#","Db9b6","x01021"],["285","D#","Dbadd9","xx3343"],["286","D#","Dbaug","32100x"],["287","D#","Dbdim","xx1212"],["288","D#","Dbm6","xx1312"],["289","D#","Dbm7","xx1322"],["290","D#","Dbm9","xx3322"],["291","D#","Dbmaj7","xx1333"],["292","D#","Dbmaj9","xx3333"],["293","D#","Dbmmaj7","xx1332"],["294","D#","Dbsus4","xx1344"],["295","Eb","Eb","3x134x"],["296","Eb","Ebm","xx4342"],["297","Eb","Eb5","xx134x"],["298","Eb","Eb7","xx1323"],["299","Eb","Eb11","xx3324"],["300","Eb","Eb6","xx1313"],["301","Eb","Eb6\/9","x11011"],["302","Eb","Eb7b5","xx1223"],["303","Eb","Eb7b9","xx2323"],["304","Eb","Eb7sus4","xx1324"],["305","Eb","Eb9","xx3323"],["306","Eb","Eb9b6","x01021"],["307","Eb","Ebadd9","xx3343"],["308","Eb","Ebaug","32100x"],["309","Eb","Ebdim","xx1212"],["310","Eb","Ebm6","xx1312"],["311","Eb","Ebm7","xx1322"],["312","Eb","Ebm9","xx3322"],["313","Eb","Ebmaj7","xx1333"],["314","Eb","Ebmaj9","xx3333"],["315","Eb","Ebmmaj7","xx1332"],["316","Eb","Ebsus4","xx1344"],["317","F#","Fb","244322"],["318","F#","Fbm","244222"],["319","F#","Fb5","244xxx"],["320","F#","Fb11","xx2424"],["321","F#","Fb13","242344"],["322","F#","Fb6","244342"],["323","F#","Fb6\/9","24x344"],["324","F#","Fb7\/6","2x234x"],["325","F#","Fb7b5","xx2312"],["326","F#","Fb7b9","xx2323"],["327","F#","Fb7sus4","xx2422"],["328","F#","Fb9","242321"],["329","F#","Fb9b5","x12112"],["330","F#","Fbaug","xx4332"],["331","F#","Fbdim","xx1212"],["332","F#","Fbm6","244242"],["333","F#","Fbm7","xx2222"],["334","F#","Fbm9","xx2224"],["335","F#","Fbmaj7","xx4321"],["336","F#","Fbmaj9","xx3324"],["337","F#","Fbmmaj7","x03222"],["338","F#","Fbsus4","xx4422"],["339","Gb","Gb","244322"],["340","Gb","Gbm","244222"],["341","Gb","Gb5","244xxx"],["342","Gb","Gb11","xx2424"],["343","Gb","Gb13","242344"],["344","Gb","Gb6","244342"],["345","Gb","Gb6\/9","24x344"],["346","Gb","Gb7\/6","2x234x"],["347","Gb","Gb7b5","xx2312"],["348","Gb","Gb7b9","xx2323"],["349","Gb","Gb7sus4","xx2422"],["350","Gb","Gb9","242321"],["351","Gb","Gb9b5","x12112"],["352","Gb","Gbaug","xx4332"],["353","Gb","Gbdim","xx1212"],["354","Gb","Gbm6","244242"],["355","Gb","Gbm7","xx2222"],["356","Gb","Gbm9","xx2224"],["357","Gb","Gbmaj7","xx4321"],["358","Gb","Gbmaj9","xx3324"],["359","Gb","Gbmmaj7","x03222"],["360","Gb","Gbsus4","xx4422"],["361","G#","Gb","xx1114"],["362","G#","Gbm","xx1104"],["363","G#","Gb5","xxx144"],["364","G#","Gb7","xx1112"],["365","G#","Gb11","xx1322"],["366","G#","Gb13","2x1311"],["367","G#","Gb6","xx1111"],["368","G#","Gb6\/9","43334x"],["369","G#","Gb7\/6","2x1111"],["370","G#","Gb7b5","xx0112"],["371","G#","Gb7b9","x01112"],["372","G#","Gb7sus4","xx1122"],["373","G#","Gb9","xx1312"],["374","G#","Gb9b5","xx0312"],["375","G#","Gbaug","43211x"],["376","G#","Gbdim","xx0101"],["377","G#","Gbm6","xx1101"],["378","G#","Gbm7","xx4444"],["379","G#","Gbm9","x2434x"],["380","G#","Gbmaj7","xx1113"],["381","G#","Gbmaj9","x11113"],["382","G#","Gbmmaj7","xx1103"],["383","G#","Gbsus4","xx1124"],["384","A","A","x02220"]];
	    $(document).ready(function(){
	    	$(".asd").greenify();
	    	var p = new Pagination(chord_data);
	    	$(".tbody").html(show_data(chord_data));
    		console.log(p);
	    	/*$('#tblchord').DataTable( {
		        data: chord_data,
		        columns: [
		            { title: "No" },
		            { title: "Chord" }
		        ]
		    } );
	    	*/

			$("#cari").keyup(function(){
				var v = $(this).val();
				if(v!=''){
					$(".tr").each(function(i){
						//$(this).hide();
						var a = $("#tr-"+(i+1)+" > td:last-child").html();
						if(a.toUpperCase() == v.toUpperCase()){
							$(this).show();
						}else{
							$(this).hide();

						}
					});
				}else{
					$(".tr").each(function(i){
						$(this).show();
					});
				}
			});
	    });

	    function show_data(data ) {
	    	var a = '';
	    	for(var i=0; i<data.length; i++){
	    		<!-- 
									/*<td><?= $i; ?></td>
									<td class="chord_txt"><?= $csv[2]; ?></td>
								</tr>*/ -->
	    		a += '<tr class="tr" id="tr-'+i+'" data-shape="'+data[i][3]+'">';
	    		a += '<td>'+(i+1)+'</td>';
	    		a += '<td>'+data[i][2]+'</td>';
	    		a += '<tr>';
	    	}
	    	return a;
	    }
	</script>
	
	<script type="text/javascript">
	    $(document).ready(function(){
			
			/*
			draw_cross(ctx, 15, 20);

			draw_pin(ctx, 55,260);
			draw_pin(ctx, 85,260);

			draw_pin(ctx, 115, 180);


			draw_pin(ctx, 145, 100);
			draw_pin(ctx, 175, 100);
			*/

			//draw_chord (ctx, '224444');
			var c = document.getElementById("chord");
			var ctx=c.getContext("2d");
			gem_gitar(ctx);	
			$(".tr").click(function(){
				$(".canvas-chord").html("");
				var sha = $(this).attr("data-shape");
				$(".canvas-chord").html('<canvas class="chord" id="chord" width="200px" height="500px"  style="border:1px solid #000000;"></canvas>');
				var c = document.getElementById("chord");
				var ctx=c.getContext("2d");
				gem_gitar(ctx);	
				draw_chord(ctx, sha);	 
			}); 
	    });

	</script>

	<script type="text/javascript" src="lib/chord.js"></script>
