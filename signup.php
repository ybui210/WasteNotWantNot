<?php
extract($_POST);

#echo $id;
#echo $username;
#echo $email;
#echo $pwd;
echo "
	INSERT INTO user(
	userName,
	email,
	password) VALUES('" .
	$username . "','" . $email . "','" . $pwd . "');";

$db = mysqli_connect('localhost', 'root', 'password') or die(mysqli_connet_error());
mysqli_select_db($db, 'bcit');

mysqli_query($db,"
CREATE TABLE IF NOT EXISTS user
(userId		INT 	PRIMARY KEY NOT NULL AUTO_INCREMENT
,userName 	VARCHAR(45) 			NOT NULL
,email 		VARCHAR(45) 			NOT NULL
,password 	VARCHAR(45) 			NOT NULL
);"
);


mysqli_query($db, "
INSERT INTO user(userName, email, password) 
VALUES('" . $username . "','" . $email . "','" . $pwd . "');"
);



?>