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
         if (!isset($_GET['delpostid']) || $_GET['delpostid']==NULL ) {
             echo "<script>window.location='postlist.php';</script>";
         }else{
            $postid=$_GET['delpostid'];
            $query="select * from tbl_post where id='$postid'";
            $getpost=$db->select($query);
            if ($getpost) {
            	while ($delimg=$getpost->fetch_assoc()) {
            		$dellink=$delimg['image'];
            		unlink($dellink);
            	}
            }

            $delquery="delete from tbl_post where id='$postid'";
            $delpost=$db->delete($delquery);
            if ($delpost) {
            	 echo "<script>alert('Post delete successfully');</script>";
            	 echo "<script>window.location='postlist.php';</script>";

            }else{

            	echo "<script>alert('Post not delete');</script>";
            	 echo "<script>window.location='postlist.php';</script>";

            }
         }
    ?> 