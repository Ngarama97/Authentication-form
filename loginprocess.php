<?php
    session_start();
    
    $errorcount = 0;

// validate if the user has provided the inputs

$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
$password = $_POST['password'] != ""? $_POST['password'] : $errorcount++;

//if not redirect back to registration page 
//else redirect the user to belogged in

if ($errorcount > 0) {

    $_SESSION["error"] = "Please fill in all the fields";
    header("location:loginpage.php");

}else {
    //count all the users 
    $allusers = scandir("files/");
    $countallusers = count($allusers);

    $array_put = [
        'email' => $email,
        'password' => $password,
    ];

    //check if the user already exists by using email & password
    for ($counter = 0; $counter < $countallusers; $counter++){
        $currentuser = $allusers[$counter];

        if($currentuser == $array_put['email'] . ".json"){

            $userdetails = json_decode(file_get_contents("files/". $currentuser)); 
                //check if the passwords match
            $passwordsaved = $userdetails -> password;  

            $passwordprovided = $password;
              
            if($passwordsaved == $passwordprovided){
                
                $_SESSION['message'] = "You are signed in";
                header("location:welcome.php");
                
            }else{
                $_SESSION['error'] = "You are either not registered or password is wrong. Please try again";
                header("location:registerpage.php");  
            }
        }
           
    }
}
?>
