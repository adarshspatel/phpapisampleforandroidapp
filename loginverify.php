<?php  
	include("connect.php");

	//================================
	//Input Parameter
	//================================
	$par1=$_GET['p1'];
	$par2=$_GET['p2'];


	//================================
	// Processing with Database
	//================================
	$eve = "select * from res_user_master where umobile='$par1' and upass='$par2'";	
	$re = mysqli_query($conn, $eve);

	$response = array();
	$posts = array();
	
	$result="0";
	$userid="";
	$ustatus="";
	$ufullname="";
	
	date_default_timezone_set("Asia/Kolkata");
	$mdate= date('Y/m/d H:i:s');
   
   if(mysqli_num_rows($re) > 0)
   {
		 while($rt = mysqli_fetch_assoc($re))
		 {
				$result="1";
				$bname=$rt['ufullname'];
				$ustatus=$rt['ustatus'];
				$utype=$rt['utype'];
				
				break;
		 }
		 
		if(strcasecmp($ustatus, "Blocked") == 0)
		{
			$result="-1";
			
			$msg = "Sorry You are Blocked for 24 Hours";
	
			//================================
			//Output in JSON
			//================================
			$posts[] = array('p1'=> $result,'p2'=> $msg);
			$response['posts'] = $posts;
			echo stripslashes(json_encode( array('item' => $posts)));
			return;
		}
		else if(strcasecmp($ustatus, "Supended") == 0)
		{
			$result="-1";
			
			$msg = "Sorry You are Supended due to Spamming.";

			//================================
			//Output in JSON
			//================================
			$posts[] = array('p1'=> $result,'p2'=> $msg);
			$response['posts'] = $posts;
			echo stripslashes(json_encode( array('item' => $posts)));
			return;
		}
		
	
	
		//================================
		//Output in JSON
		//================================
		$posts[] = array('p1'=> $result,'p2'=> $bname,'p3'=> $utype);
	
		$response['posts'] = $posts;
		echo stripslashes(json_encode( array('item' => $posts)));
	
   }
   else
   {

		//================================
		//Output in JSON
		//================================

		$result="0";
		$posts[] = array('p1'=> $result,'p2'=> "Invalid Userid or Password");
		$response['posts'] = $posts;
		echo stripslashes(json_encode( array('item' => $posts)));
	
   }
	mysqli_close($conn);
?>