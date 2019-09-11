<?php
require_once( dirname(__FILE__) . '/conf.php' );

 function the_title(){
	 global $title;
	 
	 echo $title;
 }
 
 function the_subtitle(){
	 global $subtitle;
	 
	 echo $subtitle;
 }
 
 function home_url(){
	 echo ABS_URL;
 }
 
 function the_image_url(){
	 global $image_url;
	 
	 print $image_url;
 }
 
 function the_autor(){
	 global $autor;
	 
	 echo $autor;
 }
 
 function the_date(){
	 global $date;
	 
	 echo $date;
 }
 
 
?>