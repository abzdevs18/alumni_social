<?php
function likes($conn,$p_id){
	$w = "SELECT COUNT(post_like) AS liked FROM reactions WHERE post_id = '$p_id'";
	$number = mysqli_query($conn, $w);
	$k=mysqli_fetch_assoc($number);
	echo $k['liked'];
}

function reactionsFromBeginning($conn){
	$w = "SELECT COUNT(post_like) AS liked FROM reactions";
	$number = mysqli_query($conn, $w);
	$k=mysqli_fetch_assoc($number);	
	echo $k['liked'];
}
function registered($conn){
	$w = "SELECT * FROM users WHERE id != 0";
	$number = mysqli_query($conn, $w);
	$k=mysqli_num_rows($number);	
	echo $k;
}
function messagesReceive($conn){
	$w = "SELECT * FROM tbl_msg";
	$number = mysqli_query($conn, $w);
	$k=mysqli_num_rows($number);	
	echo $k;
}
function commentsNumber($conn){
	$w = "SELECT * FROM comments";
	$number = mysqli_query($conn, $w);
	$k=mysqli_num_rows($number);	
	echo $k;
}
