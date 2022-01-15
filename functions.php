<?php


function check_login($conn)
{
    
     if(isset($_SESSION['user_id']))
     {
         $id = $_SESSION['user_id'];
         $query= "select * from users where user_id = '$id' limit 1";

         $result= mysqli_query($conn,$query);
         if($result && mysqli_num_rows($result)>0)
         {
                $user_data=mysqli_fetch_assoc($result);
                return $user_data;
         }

     }

     //redirect to login
     header("Location: login.php");
     die;
}



function random_number($length)
{
    $text="";
    if($length<5)
    {
        $length=5;
    }
    $len=rand(4,$length);
    for($i=0; $i<$len;$i++)
    {
        $text.=rand(0,9);
    }
    return $text;

}

function getImagesByPost($conn,$post_id)
{
    
    $query = "select * from images where post_id=$post_id";
    $run=mysqli_query($conn,$query);
    $data= array();
    while($d=mysqli_fetch_assoc($run))
    {
        $data[]=$d;
    }
    return $data;
}

function check_return($flag,$post_id_image,$images_id,$conn)
{
    if($flag)
    {
        //print_r($post_id_image);
       // echo "<br>";
        return $images_id[$post_id_image];
    }
    else
    {
        $post_id_temp='0';
        $post_image_temp=getImagesByPost($conn,$post_id_temp);
        $x=$post_image_temp[0]['images'];
        //print_r($post_image_temp);
        return $x;
    }
}