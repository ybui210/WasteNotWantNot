function leftovers() {
	var canvas = document.getElementById("canvas");

	var ctx = canvas.getContext("2d");

	ctx.canvas.width  = window.innerWidth;
	ctx.canvas.height = window.innerHeight;
	var base_image;
	// newly spawned objects start at Y=-100 
	var spawnLineY = 35;
	// spawn a new object every 300ms 
	var spawnRate = 300;
	// set how fast the objects will fall 
	var spawnRateOfDescent = 7;
	// when was the last object spawned 
	var lastSpawn = -1;
	// this array holds all spawned object 
	var objects = [];

	//cloud image
	var cloud_img;
	//lightning bolt image
	var light_img;
	//position of cloud #1 //starts from far left
	var pos1 = -600;
	//position of cloud #2 //starts form far right
	var pos2 = ctx.canvas.width;
	//interval for clouds
	var id = setInterval(cloud, 3);
	
	// start cloud, and lightning then animate food rain
	cloud();
	var id2 = setInterval(lightning, 50);
	setTimeout(animate, 5100);
	
	//create object
	function spawnRandomObject() {
		// select a random type forthis new object 
		var t;
		// Math.random() generates a semi-random number between 0-1.
		// if random < 1/3, pizza; random < 2/3, hamburger; else meatball.
		if (Math.random() < 0.33) {
			t = "pizza.gif";
		} else if (Math.random() < 0.66) {
			t = "hamburger.png";
		} else {
			t = "meatball.png";
		}
		// create the new object 
		var object = { // set this objects type 
			type: t,
			// set x randomly
			x: Math.random() * (canvas.width*0.7)+80,
			// set y to start on the line where objects are spawned 
			y: spawnLineY,
		} // add the new object to the objects[] array 
		objects.push(object);
	}
	function animate() { // get the elapsed time 		
		var time = Date.now();// see if its time to spawn a new object 
		if (time > (lastSpawn + spawnRate)) {
			lastSpawn = time;
			spawnRandomObject();
		} // request another animation frame 
		requestAnimationFrame(animate);
		// clear the canvas so all objects can be // redrawn in new positions 
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		ctx.drawImage(cloud_img, pos2, 5);
		ctx.drawImage(cloud_img, pos1, 5);
		// move each object down the canvas 
		for (var i = 0; i < objects.length; i++) {
			var object = objects[i];
			object.y += spawnRateOfDescent;
			base_image = new Image();				
			base_image.onload = function() {}
			base_image.src = 'img/'+object.type;			
			ctx.drawImage(base_image, object.x, object.y);		
		}
	}
	function cloud(){				
		cloud_img = new Image();
		cloud_img.onload = function() {}
		cloud_img.src='img/cloud.png';		
		if (pos1 == Math.round(ctx.canvas.width*0.05)) {
			clearInterval(id);
		} else {
			ctx.clearRect(0, 0, canvas.width, canvas.height);			
			pos2--;
			if (pos2 < ctx.canvas.width-60){
				pos1++; 
				ctx.drawImage(cloud_img, pos1, 5);
			}			
			ctx.drawImage(cloud_img, pos2, 5); 
		}
	}

	function lightning() {
		light_img = new Image();
		light_img.onload = function() {}
		light_img.src='img/lightning.png';

		ctx.clearRect(0, 0, canvas.width, canvas.height);
		ctx.drawImage(cloud_img, pos2, 5);
		ctx.drawImage(cloud_img, pos1, 5);
		ctx.drawImage(light_img, canvas.width*0.1, 20);
	}
}

//==========================================
