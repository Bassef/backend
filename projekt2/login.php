    <!-- Loginformulär -->
<form action="index.php" method="get">
    Användarnam <br><input type="text" name="usr"><br>
    Lösenord <br><input type="password" name="psw"><br>
    <input type="hidden" name="stage" value="login">
    <input type="submit" value="Logga in">
</form>
<?php

if (isset($_REQUEST["stage"]) && $_REQUEST["stage"] == "login") {

    $conn = create_conn();
    $username = test_input($_REQUEST['usr']);
    $password = test_input($_REQUEST['psw']);
    
    if ($username != "" && $password != ""){
        $pass = test_input(hash("Sha256", $password));
        $sql = "SELECT * FROM users WHERE username='$username' and password='$pass'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        $count = mysqli_num_rows($result);
        
        if($count > 0){
            $_SESSION["user"] = $username;
            header("Location: ./profile.php");
        }else{
            echo "Fel användarnamn eller lösenord!";
            
        }

    }

    
}

?>