<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Profilsidan</h1>
  
	
    <?php
    // Här hämtar vi användarens data
    // print($_SESSION["user"]);

    $profil = test_input($_REQUEST["user"]);
 
    if ($profil) {
        $conn = create_conn(); // mysqli objektet skapas
        
        print("<br>" . $profil. "'s" . " profil" ."</br>");


        $sql2 = "SELECT likes FROM users WHERE username=?";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param("s",$profil);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
        $skr = $row['likes'];
        
        

        print("<br>".  "Likes: " . $skr. "<br>");

        print("<form action='profile.php?user=$profil' method='post'>");
        print("<input type='submit' name='ok' value='Like'>");
        print("<input type='submit' name='ok2' value='Unlike'>");

        print("</form>");
        
        
        $sql = "SELECT id FROM users WHERE username='$profil'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $mo1 = $row['id'];
        

        print("</br><form action='profile.php?user=$profil' method='post'>");

        print("<textarea id='kommentar' name='kommentar' rows='5' cols='50'> Skriv en kommentar!
        </textarea>");
        
        print("<br><input type='submit' name='comm' value='Kommentera'></br>");
        print("</form>");

          
        $txt = test_input($_REQUEST['kommentar']);


        
        
        if(isset($_REQUEST['comm'])) {

            
            $statement = $conn->prepare("INSERT INTO `comments` (`comment`, `profile_id`) VALUES (?, ?)");
            $statement->bind_param("ss", $txt, $mo1);
            if ($statement->execute()) {    
                print("Kommentar postad!");
            }
            else {
                print("Problem!");
            }
        }
        
        print("<br>" . "Kommentarer: " ."<br>"."<br>"); 



        $kommen = "SELECT comment FROM comments WHERE profile_id='$mo1'";




        
        $result = $conn->query($kommen);
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                print("<span class='border'>" . $row["comment"]. "</span>"."<br>"."<br>");
            }
        }

        if(isset($_REQUEST['ok']) || isset($_REQUEST['ok2'])) { 

            if(isset($_REQUEST['ok'])) {
                $skr1 = $skr + 1;
            }
            if(isset($_REQUEST['ok2'])) {
                $skr1 = $skr - 1;
            }

            $sql3 = "UPDATE users SET likes='$skr1' WHERE id='$mo1'";

            if (mysqli_query($conn, $sql3)) {
                
            } else {
                echo "Skit: " . mysqli_error($conn);
            }
        }

      
        
       
        //SELECT id, usernamne FROM users WHERE usernamne = $_REQUEST['user'];
        //SELECT comment FROM comments WHERE profile_id = $row['id'];
       

    }
    else if (isset($_SESSION["user"])) {
        $conn = create_conn(); // mysqli objektet skapas
        $user = $_SESSION["user"]; // Kolla vem som är inloggad
        $sql = "SELECT * FROM users WHERE username = ?"; // ? placeholder för data
        
        $stmt = $conn->prepare($sql); // Prepare retunrnerar mysql_stmt objekt
        $stmt->bind_param("s",$user); // Mata in användarinmatad data i sql
        $stmt->execute(); // Returnerar true eller false (lyckade köras på DBn eller ej)
        
        $result = $stmt->get_result(); // Returnerar data i from av ett mucsqli_result objekt
        $row = $result->fetch_assoc(); // Tar ut datan från musqli_result objektet till en assArr

        
        

       
    
        print("<form action='profile.php' method='get'");
        print("<p>ID:<br> <input type='text' name='id' value='" . $row['id'] . "'></br>");
        print("<p>Användarnamet:<br> <input type='text' name='username' value='" . $row['username'] . "'></br>");
        print("<p>Riktiga namnet:<br> <input type='text' name='realname' value='" . $row['realname'] . "'></br>");
        print("<p>Lösenord:<br> <input type='password' name='password' " . $row['password'] . "'></br>");
        print("<p>Email:<br> <input type='text' name='email' value='" . $row['email'] . "'></br>");
        print("<p>Postnummer:<br> <input type='text' name='zipcode' value='" . $row['zipcode'] . "'></br>");
        print("<p>Annonstext:<br> <textarea name='bio'>" . $row['bio'] . "</textarea></p>");
        print("<p>Årslön: <br><input type='text' name='salary' value='" . $row['salary'] . "'></br>");
        print("<p>Preferens:<br> <input type='text' name='preference' value='" . $row['preference'] . "'></br>");
        print("<input type='submit' name='uppdate' value='Uppdatera'></br>");
        print("<p>Ta bårt din profil ");
        print("<p>Ditt lösenord: <br><input type='password' name='psw'></br>");
        print("<input type='submit' name='delete' value='Delete'></br>");
        print("</form>");

        if (isset($_REQUEST['uppdate'])) { 
            if (isset($_REQUEST)>0) {
                $id = test_input($_REQUEST["id"]);
                $realname = test_input($_REQUEST["realname"]);
                $email = test_input($_REQUEST["email"]);
                $zip = test_input($_REQUEST["zipcode"]);
                $bio = test_input($_REQUEST["bio"]);
                $salary = test_input($_REQUEST["salary"]);
                $preference = test_input($_REQUEST["preference"]);
                $password = test_input($_REQUEST["password"]);
                $password = test_input(hash("sha256", $password));
            

                
                $stmt = $conn->prepare( "UPDATE users SET realname=?, email=?, zipcode=?, bio=?, salary=?, preference=?, password=?  WHERE id=?");
                $stmt->bind_param("ssisiisi", $realname, $email, $zip, $bio, $salary, $preference, $password, $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                
                
                if ($result) {
                    
                    
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
                
        }
        
        if (isset($_REQUEST['delete'])) { 
            $conn = create_conn();
            $username = test_input($_REQUEST['username']);
            $password = test_input($_REQUEST['psw']);
            
            if ($username != "" && $password != ""){
                $pass = hash("Sha256", $password);

                $stmt = $conn->prepare("SELECT * FROM users WHERE username=? and password=?");
                $stmt->bind_param("ss",$username, $pass);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
        
                $count = mysqli_num_rows($result);
                if($count > 0){
                
                    $id = test_input($_REQUEST["id"]);
                    $sql4 = "DELETE FROM users WHERE id='$id'";

                    $sql4 = $conn->prepare("DELETE FROM users WHERE id=?");
                    $sql4->bind_param("i",$id);
                    $sql4->execute();

                    print("Deleted!");
                
                }else{
                    print("Fel lösenord!");
                    
                }
        
            }
        }
        

        
    }
    
    
    
    
    else {
        print("Du försöker se på nån annans profil");

    }




    ?>
  

    
</article>

<?php include "footer.php" ?>