function leftovers() {
	var canvas = document.getElementById("canvas");

	var ctx = canvas.getContext("2d");

	ctx.canvas.width  = window.innerWidth;
	ctx.canvas.height = window.innerHeight;
	var base_image;
	// newly spawned objects start at Y=-100 
	var spawnLineY = -100;
	// spawn a new object every 300ms 
	var spawnRate = 300;
	// set how fast the objects will fall 
	var spawnRateOfDescent = 7;
	// when was the last object spawned 
	var lastSpawn = -1;
	// this array holds all spawned object 
	var objects = [];
	// save the starting time (used to calc elapsed time)
	var startTime = Date.now();
	// start animating 
	animate();
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
			// set x randomly but at least 1/10 off the canvas edges 
			x: Math.random() * (canvas.width),
			// set y to start on the line where objects are spawned 
			y: spawnLineY,
		} // add the new object to the objects[] array 
		objects.push(object);
	}
	function animate() { // get the elapsed time 
		var time = Date.now(); // see if its time to spawn a new object 
		if (time > (lastSpawn + spawnRate)) {
			lastSpawn = time;
			spawnRandomObject();
		} // request another animation frame 
		requestAnimationFrame(animate);
		// clear the canvas so all objects can be // redrawn in new positions 
		ctx.clearRect(0, 0, canvas.width, canvas.height);
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
}
//==========================================
