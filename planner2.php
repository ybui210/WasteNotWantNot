<?php

extract($_POST);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>WNWN :: Meal Planner</title>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/bootstrap.min.css">
	<!--<link href="style/style.css" rel="stylesheet" media="screen">-->
  <link href="style/planner_style.css" rel="stylesheet" media="screen">
	<script src="bootstrap/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="bootstrap/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
			var bmeal = document.getElementById('Bmeal');
			var lmeal = document.getElementById("Lmeal");
			var dmeal = document.getElementById("Dmeal");
			function loadMeal() {
				var xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
     			document.getElementById("Bmeal").innerHTML = this.responseText;
    			}
  				};

  				xhttp.open("GET", "recipe.txt", true);
  				xhttp.send();
			}

			function disableHidden() {
				var message = document.getElementById("message");
				var dishName = document.getElementById("dishName");
				var select = document.getElementById("bmealSelect");
				select.style.visibility = "visible";
				message.innerHTML = "<div class='alert alert-info'><strong>Info!</strong> Please tell us how much you have eaten for your meal!!</div>"

			}

			var date = new Date();
			var day = date.getDate();
			var month = date.getMonth() + 1;
			var year = date.getFullYear();

			if (month < 10) month = "0" + month;
			if (day < 10) day = "0" + day;

			var today = year + "-" + month + "-" + day;      
			//document.getElementById("mealDate").value = today;
	</script>
	<!--<link href="style/bootstrap.min.css" rel="stylesheet" media="screen">-->

<title>Meal Planner</title>
</head>

<body>
  <!--nav bar-->
	<nav class="navbar navbar-inverse" style="background: #b998f2">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="home.html">Waste Not Want Not</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                <li class="active"><a href="home.html">Home</a></li>
                <li><a href="profile.html"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                <li><a href="planner.html"><span class="glyphicon glyphicon-calendar"></span>Meal Planner</a></li>
                <li><a href="achievement.html"><span class="glyphicon glyphicon-queen"></span>Achievements</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.html"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
                </ul>
            </div>
        </div>
  </nav>
  <!-- date input -->
  <div class="well">
    	<label for="mealDate">Meal Plan Date</label>
		  <input type="date" name="mealPD" id="mealDate">	
  </div>
  <!-- planner content -->
  <div class="container">
    <!-- breakfast -->
    	<div class="panel-group">
    	<div class="panel panel-default">
  			<div class="panel-heading">
          <p class="panel-title">
            <a data-toggle="collapse" href="#breakfast">Breakfast</a>
          </p>
        </div>
        <div id="breakfast" class="panel-collapse collapse">
  			<div class="panel-body" name="recipe" id="Bmeal">
  				<div id="dishName">
          <?php
            $breakfast = 'breakfast';
            if(!isset($dishname)) {
              echo "<a href='addMeal2.html?meal='" . $breakfast . "'><span class='glyphicon glyphicon-plus-sign'></span></a>";
            } else {
              echo "<a href='editMeal.html' class='planner2_dishName'>$dishname</a>";
              if (isset($in1))
                echo "<p class='planner2_ingredientName'>$in1</p>";
              if (isset($in2))
                echo "<p class='planner2_ingredientName'>$in2</p>";
              if (isset($in3))
                echo "<p class='planner2_ingredientName'>$in3</p>";
              if (isset($in4))
                echo "<p class='planner2_ingredientName'>$in4</p>";
              if (isset($in5))
                echo "<p class='planner2_ingredientName'>$in5</p>";
              if (isset($in6))
                echo "<p class='planner2_ingredientName'>$in6</p>";
              if (isset($in7))
                echo "<p class='planner2_ingredientName'>$in7</p>";
              if (isset($in8))
                echo "<p class='planner2_ingredientName'>$in8</p>";
              if (isset($in9))
                echo "<p class='planner2_ingredientName'>$in9</p>";
              if (isset($in10))
                echo "<p class='planner2_ingredientName'>$in10</p>";
            }
  				  
          ?>
          </div>
          <div id="bmealSelect" class="completeEaten">
          <br/>
          <select class="select" id="bmealeatpercent">
  					<option value="100">All</option>
  					<option value="75">Most</option>
  					<option value="50">Some</option>
  					<option value="25">A Little</option>
  					<option value="0">None</option>
				  </select> 			
          </div>
          <br/>
        <div id="message"></div>
			</div>
      </div>
		</div>
    </div>
		<!-- Lunch -->
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title">
            <a data-toggle="collapse" href="#lunch">Lunch</a>
          </p>
        </div>
        <div id="lunch" class="panel-collapse collapse">
          <div class="panel-body" name="recipe" id="Bmeal">
            <div id="dishName">
              <a href="addMeal2.html">
                <span class="glyphicon glyphicon-plus-sign"></span>
              </a>
            </div>
            <div id="bmealSelect" class="completeEaten">
            <br/>
              <select class="select" id="bmealeatpercent">
                <option value="100">All</option>
                <option value="75">Most</option>
                <option value="50">Some</option>
                <option value="25">A Little</option>
                <option value="0">None</option>
              </select>       
            </div>
            <br/>
            <div id="message"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Dinner -->
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title">
            <a data-toggle="collapse" href="#dinner">Lunch</a>
          </p>
        </div>
        <div id="dinner" class="panel-collapse collapse">
          <div class="panel-body" name="recipe" id="Bmeal">
            <div id="dishName">
              <a href="addMeal2.html">
                <span class="glyphicon glyphicon-plus-sign"></span>
              </a>
            </div>
            <div id="bmealSelect" class="completeEaten">
            <br/>
              <select class="select" id="bmealeatpercent">
                <option value="100">All</option>
                <option value="75">Most</option>
                <option value="50">Some</option>
                <option value="25">A Little</option>
                <option value="0">None</option>
              </select>       
            </div>
            <br/>
            <div id="message"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- pager -->
		<div>
		<ul class="pager">
  		<li><a href="#">Previous Day</a></li>
  		<li><a href="#">Next Day</a></li>
		</ul>
		</div>
    </div>
</body>
</html>