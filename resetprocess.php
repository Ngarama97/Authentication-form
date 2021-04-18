<?php
    session_start();
    
    $errorcount = 0;

// validate if the user has provided the inputs

$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
$newpassword = $_POST['newpassword'] != "" ? $_POST['newpassword'] : $errorcount++;

//if not prompt him to fill in the inputs

if ($errorcount > 0){

    $_SESSION["error"] = "Please fill in all the fields";
    header("location:reset.php");

}else {
    //count all the users 
    $allusers = scandir("files/");
    $countallusers = count($allusers);

    $array_put = [
        'email' => $email,
        'password' => $newpassword,
    ];

    //check if the user already exists by using email 
    for ($counter = 0; $counter < $countallusers; $counter++){
        $currentuser = $allusers[$counter];

        if($currentuser == $array_put['email'] . ".json"){

            // get the details from the DB and set them in an array
            $userdetails = json_decode(json_encode(json_decode(file_get_contents("files/". $currentuser))), true);

            //get the details provided from the user as an array
            $newdetails = $array_put;
            
            //replace the old password with the new password
               $new_array = array_replace($userdetails, $newdetails);


            // update the contents in the file DB
                
            print_r($userdetails); 
            print_r($newdetails);        
        }
           
    }
}
?>
