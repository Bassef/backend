<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Profilsidan</h1>
  
	
    <?php
    // Här hämtar vi användarens data
    // print($_SESSION["user"]);

    $profil = $_GET["user"];
 
    if ($profil) {
        $conn = create_conn(); // mysqli objektet skapas
        
        print("<br>" . $profil. "'s" . " profil" ."</br>");


        $sql2 = "SELECT likes FROM users WHERE username='$profil'";
        $result = $conn->query($sql2);
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

          
        $txt = $_POST['kommentar'];


        
        
        if(isset($_REQUEST['comm'])) {

            $kom = "INSERT INTO `comments` (`id`, `comment`, `profile_id`) VALUES (NULL, '$txt', '$mo1')";

            if (mysqli_query($conn, $kom)) {
                print("Kommentar postad" . "<br>" );
            } else {
                print("Error");
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

      
        // TODO: Kommentarsformuläret
       
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
            

                
                
                $sql2 = "UPDATE users SET realname='$realname', email='$email', zipcode='$zip', bio='$bio', salary='$salary', preference='$preference', password='$password'  WHERE id='$id'";
                $sql4 = "DELETE FROM users WHERE id='$id'";
                if (mysqli_query($conn, $sql2)) {
                    
                    
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
                $sql = "SELECT * FROM users WHERE username='$username' and password='$pass'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                $count = mysqli_num_rows($result);
                
                if($count > 0){
                
                    $id = $_REQUEST["id"];
                    $sql4 = "DELETE FROM users WHERE id='$id'";
                    
                    if (mysqli_query($conn, $sql4)) {
                        echo "Rip bro";
                        
                    } else{
                        echo "Error $sql4. " . mysqli_error($link);       
                    }
                }else{
                    echo "Fel lösenord!";
                    
                }
        
            }
        }
        

        // TODO: Skriv ut tidigare kommentarer på ens profil
        
    }
    
    
    
    
    else {
        print("Du försöker se på nån annans profil");
        // TODO: Kommentarsformuläret
        // För att hitta kommentarerna för en viss profil måste ni hitta idn för profilen
        //SELECT id, usernamne FROM users WHERE usernamne = $_REQUEST['user'];
        //SELECT comment FROM comments WHERE profile_id = $row['id'];
    }




    ?>
  

    
</article>

<?php include "footer.php" ?>