<?php 
  include "../lib/Session.php";
  Session::checkSession();
?>
<?php include "../config/config.php"; ?>
<?php include "../lib/Database.php"; ?>
<?php
  $db=new Database();
?>
 <?php
         if (!isset($_GET['sliderid']) || $_GET['sliderid']==NULL ) {
             echo "<script>window.location='sliderlist.php';</script>";
         }else{
            $sliderid=$_GET['sliderid'];
            $query="select * from tbl_slider where id='$sliderid'";
            $getpost=$db->select($query);
            if ($getpost) {
            	while ($delimg=$getpost->fetch_assoc()) {
            		$dellink=$delimg['image'];
            		unlink($dellink);
            	}
            }

            $delquery="delete from tbl_slider where id='$sliderid'";
            $delpost=$db->delete($delquery);
            if ($delpost) {
            	 echo "<script>alert('Slider delete successfully');</script>";
            	 echo "<script>window.location='sliderlist.php';</script>";

            }else{

            	echo "<script>alert('Slider not delete');</script>";
            	 echo "<script>window.location='sliderlist.php';</script>";

            }
         }
    ?> 