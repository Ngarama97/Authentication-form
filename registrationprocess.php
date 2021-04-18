
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
    header("location:registerpage.php");

}else {
    //count all the users 
    $allusers = scandir("files/");
    $countallusers = count($allusers);

    $array_put = [
        'email' => $email,
        'password' => $password,
    ];

    //check if the user already exists by using email
    for ($counter = 0; $counter < $countallusers; $counter++){
        $currentuser = $allusers[$counter];

        if($currentuser == $array_put['email'] . ".json"){
            
            $_SESSION['error'] = "The user already exists";
            header("location:registerpage.php");
        }
    }


    //save the files in the file system as a DB
    file_put_contents('files/' . $array_put['email'] . ".json", json_encode($array_put));
    $_SESSION["message"] = "Registration sucessful, you can now login";
    header("location:loginpage.php");
}

?>
