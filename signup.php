<?php
extract($_POST);


/*echo "
	INSERT INTO user(
	userName,
	email,
	password) VALUES('" .
	$username . "','" . $email . "','" . $pwd . "');";*/

//connect to database
$db = mysqli_connect('localhost', 'root', 'password') or die(mysqli_connet_error());
mysqli_select_db($db, 'bcit');

//create table if not exit
mysqli_query($db,"
CREATE TABLE IF NOT EXISTS user
(userId		INT 	PRIMARY KEY NOT NULL AUTO_INCREMENT
,userName 	VARCHAR(45) 			NOT NULL
,email 		VARCHAR(45) 			NOT NULL
,password 	VARCHAR(45) 			NOT NULL
);"
);

//validate email address
$result = mysqli_query($db, "SELECT * FROM user;");
$num_rows = mysqli_num_rows($result);
$count = 0;
$confirm_email = 0;
$emailArray;
while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
	echo $row[2]."<br/>";
	$emailArray[$count] = $row[2];
	$count++;
}
for($i = 0; $i < $num_rows; $i++) {
	if ($emailArray[$i] === $email) {
		echo "email has been used before";
		header("Location: signup.html");
		$confirm_email = 0;
	} else {
		echo "email is ok to use<br/>";
		$confirm_email = 1;
	}
}

//insert value
if ($confirm_email === 1) {
	mysqli_query($db, "
	INSERT INTO user(userName, email, password) 
	VALUES('" . $username . "','" . $email . "','" . $pwd . "');"
	);
	header("Location: home.html");
} else {
	header("Location: signup.html");
}

//redirect to index page

?>