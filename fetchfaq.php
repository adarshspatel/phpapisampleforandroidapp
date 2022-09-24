<?php  
	
	include("connect.php");
	
	
	//================================
	// Processing with Database
	//================================
	$eve = "select * from res_faq_master";
	$re = mysqli_query($conn, $eve);

	
	$response = array();
	$posts = array();
	
	$result="0";
	
	if(mysqli_num_rows($re) > 0)
	{
		 while($rt = mysqli_fetch_assoc($re))
		 {
				$result="1";
				$p2=$rt['fmid'];
				$p3=$rt['fname'];
				$p4=$rt['fsortdesc'];
				
				
				
				$posts[] = array('p1'=> $result,'p2'=> $p2,'p3'=> $p3,'p4'=> $p4);
	
				
		 }
		 
		//================================
		//Output in JSON
		//================================ 
		$response['posts'] = $posts;
		echo stripslashes(json_encode($posts));
		return;
	}
	
   else
   {
		$result="0";
		$msg="Invalid Error";
		
		$posts[] = array('p1'=> $result,'p2'=> $msg);
	
		//================================
		//Output in JSON
		//================================
		$response['posts'] = $posts;
		echo stripslashes(json_encode($posts));
   }
   
mysqli_close($conn);
?>