
function gem_gitar(ctx) {


	var x_bar = 20;
	var y_bar = 50;

	ctx.lineWidth=5;
	ctx.moveTo(0, y_bar);
	ctx.lineTo(200, y_bar);

	y_bar += 10;
	ctx.moveTo(0, y_bar);
	ctx.lineTo(200, y_bar);
	ctx.stroke();

	/*-- draw senar --*/
	x_bar += 5; 
	ctx.lineWidth=3;
	for(var i = 1; i <= 6; i++){
		ctx.moveTo(x_bar, y_bar);
		ctx.lineTo(x_bar, y_bar+500);
		x_bar += 30;

	}
	ctx.stroke();


	/*-- draw freet --*/
	ctx.lineWidth=1;
	for(var i = 1; i <= 5; i++){
		y_bar += 80;
		ctx.moveTo(0, y_bar);
		ctx.lineTo(200, y_bar);
	}
	ctx.stroke();

	/*-- draw dot --*/
	ctx.beginPath();
	ctx.arc(100,260,8,0,2*Math.PI);
	ctx.fillStyle = "black";
	ctx.fill();

	ctx.beginPath();
	ctx.arc(100,420,8,0,2*Math.PI);
	ctx.fillStyle = "black";

	ctx.fill();
}

function draw_chord (ctx, shape) {
	/* 
		x += 30 
		y += 80 
	*/
	var x_pos = 55;
	var y_pos = 100;
	for(var i=0; i<shape.length; i++ ){
		if(shape[i]=='x'){
			draw_cross(ctx, (15 + (30*i) ), 20);
		}else if(shape[i]!='0'){
			draw_pin(ctx, x_pos + (30*(i-1)), y_pos + ((parseInt(shape[i])-1) * 80 ) );
		}else{
			draw_pin(ctx, x_pos + (30*(i-1)), 30 );
		}
	}
}

function draw_cross(ctx, x, y){
	ctx.lineWidth=1;
	ctx.moveTo(x, y);
	ctx.lineTo(x+20, y+20);


	ctx.moveTo(x+20, y);
	ctx.lineTo(x, y+20);

	ctx.stroke();
}

function draw_pin(ctx, x, y) {
	ctx.beginPath();
	ctx.arc(x,y,13,0,2*Math.PI);
	ctx.fillStyle = "#EEE";
	ctx.fill();
	ctx.stroke();
}

/*===================================================================*/

function gem_gitar2(ctx) {

	var x_bar = 30;
	var y_bar = 5;

	ctx.lineWidth=5;
	ctx.moveTo(x_bar, 0);
	ctx.lineTo(x_bar, 100);


	x_bar += 10;
	ctx.moveTo(x_bar, 0);
	ctx.lineTo(x_bar, 100);
	ctx.stroke();

	y_bar += 5; 
	ctx.lineWidth=3;
	for(var i = 1; i <= 6; i++){
		ctx.moveTo(x_bar, y_bar);
		ctx.lineTo(x_bar+250, y_bar);
		y_bar += 16;
	}
	ctx.stroke();

	ctx.lineWidth=1;
	for(var i = 1; i <= 6; i++){
		x_bar += 40;
		ctx.moveTo(x_bar, 0);
		ctx.lineTo(x_bar, 100);
	}
	ctx.stroke();

	ctx.beginPath();
	ctx.arc(140,50,4,0,2*Math.PI);
	ctx.fillStyle = "black";
	ctx.fill();

	ctx.beginPath();
	ctx.arc(220,50,4,0,2*Math.PI);
	ctx.fillStyle = "black";

	ctx.fill();
}


function draw_chord2 (ctx, shape) {
	var x_pos = 15;
	var y_pos = 90;
	for(var i=0; i<shape.length; i++ ){
		if(shape[i]=='x'){
			draw_cross2(ctx, 8, y_pos - ( 6 + (16 * i) ) );
		}else if(shape[i]!='0'){
			draw_pin2(ctx, x_pos + (41 *  (parseInt(shape[i])) ), y_pos - (16 * i) );
		}else{
			draw_pin2(ctx, x_pos, y_pos-(16 * i) );
		}
	}
}


function draw_cross2(ctx, x, y){
	ctx.lineWidth=1;
	ctx.moveTo(x, y);
	ctx.lineTo(x+10, y+10);


	ctx.moveTo(x+10, y);
	ctx.lineTo(x, y+10);

	ctx.stroke();
}

function draw_pin2(ctx, x, y) {
	ctx.beginPath();
	ctx.arc(x,y,7,0,2*Math.PI);
	ctx.fillStyle = "#CD1920";
	ctx.fill();
	ctx.stroke();
}