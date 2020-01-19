<div class="container-fluid header-main">
	<img src="assets/img/GuitarHoo_Logo.png" alt="logo">
  	<!-- <h1><span class="color-yellow">O</span>PMANGA</h1> -->
</div>
<form class="form-inline">
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control inp-cari" id="cari" placeholder="Cari">
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
	$(function() {
    	$(window).bind("load resize", function() {
    		
    		var height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
    		var hcont = $(".navbar-main").height() + $(".body-main").height() + $("footer").height() + 20;
    		var mt = height-hcont;
    		console.log(height);
    		console.log(hcont);
    		console.log(mt);

    		$("footer").css("margin-top", mt+"px");

    	});
        
        $("#cari").keyup(function(){
            var val = $(this).val();
            //console.log(val);
            $(".auto_complete_box").show();
            $(".hasil_cari_list").load('pages/autocomplete.php?cari='+encodeURIComponent(val));
        });
        $("body").blur(function(){
            $(".auto_complete_box").hide();
        });
    });


</script>