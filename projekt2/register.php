<!-- Loginformulär -->

<form action="index.php" method="post">
    Användarnamn <br><input type="text" name="usr"><br>
    Riktigt namn <br><input type="text" name="rn"><br>
    Lösenord <br><input type="password" name="psw"><br>
    Email <br><input type="text" name="mail"><br>
    Postnummer <br><input type="text" name="pn"><br>
    Annonstext (“Berätta om dig”) <br><input type="text" name="bod"><br>
    Årslön <br><input type="number" name="al"><br>
    Preferens (1 = Man, 2 = Kvinna, 3 = Båda, 4 = Annat, 5 = Alla)<br><input type="number" max="5" min="1" name="pref"><br>
	

    <input type="hidden" name="stage" value="signup">
    <input type="submit" name="register" value="Registrera dig">
</form>

<?php


// Kolla att man klickat submit!
if (isset($_REQUEST["usr"]) && isset($_REQUEST["psw"])  ){
    if (isset($_REQUEST['register'])) {
        
        $conn = create_conn();
        $username = test_input($_REQUEST["usr"]);
        $email = test_input($_REQUEST["mail"]); 
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $stmt1 = $conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt1->bind_param("s",$email);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $row1 = $result1->fetch_assoc();
        
        if ($row['username'] == $username) {
            print("Användarnamn taget..."); 
        }else if($row1['email'] == $email) {
            print("Email taget..."); 	
        }else {
            // Hämta data från formulär
            // Kom ihåg xss protection
            $username = test_input($_REQUEST["usr"]);
            $password = test_input($_REQUEST["psw"]);
            $password = test_input(hash("sha256", $password));
            $realname = test_input($_REQUEST["rn"]); 
            $email = test_input($_REQUEST["mail"]); 
            $zip = test_input($_REQUEST["pn"]);
            $bio = test_input($_REQUEST["bod"]);
            $salary = test_input($_REQUEST["al"]);
            $preference = test_input($_REQUEST["pref"]);
            $likes = 0;
    
            // Prepared statements går snabbare att köra och skyddar mot SQL Injection!
            $statement = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference, likes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->bind_param("ssssisiii", $username, $realname, $password, $email, $zip, $bio, $salary, $preference, $likes);
            // De flesta metoderna returnerar ett objekt (sant) om de lyckas & false ifall de misslyckas.
            if ($statement->execute()) {    
                print("Du har registrerats!");
            }
            else {
                print("Problem!");
            }
                
        
        }  
    }  
}
    

