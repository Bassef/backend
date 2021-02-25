<?php
// ALLA!!
if (isset($_REQUEST['pref']) && isset($_REQUEST["like"]) && isset($_REQUEST["salary"])) {
    $pref = ($_REQUEST["pref"]);
    $like = ($_REQUEST["like"]);
    $rika = ($_REQUEST["salary"]);
    print("Pref, likes och lönen");
    

    if($pref == "male" && $like == "pop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='1' ORDER BY salary DESC, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "male" && $like == "pop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='1' ORDER BY salary, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "male" && $like == "notpop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='1' ORDER BY salary DESC, likes LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "male" && $like == "notpop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='1' ORDER BY salary, likes LIMIT 5";
        fetchAndWrite($sql);

    }




    if($pref == "female" && $like == "pop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='2' ORDER BY salary DESC, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "female" && $like == "pop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='2' ORDER BY salary, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "female" && $like == "notpop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='2' ORDER BY salary DESC, likes LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "female" && $like == "notpop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='2' ORDER BY salary, likes LIMIT 5";
        fetchAndWrite($sql);

    }





    if($pref == "other" && $like == "pop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='3' ORDER BY salary DESC, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "other" && $like == "pop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='3' ORDER BY salary, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "other" && $like == "notpop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='3' ORDER BY salary DESC, likes LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "other" && $like == "notpop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='3' ORDER BY salary, likes LIMIT 5";
        fetchAndWrite($sql);

    }

 



    if($pref == "both" && $like == "pop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='4' ORDER BY salary DESC, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "both" && $like == "pop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='4' ORDER BY salary, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "both" && $like == "notpop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='4' ORDER BY salary DESC, likes LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "both" && $like == "notpop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='4' ORDER BY salary, likes LIMIT 5";
        fetchAndWrite($sql);

    }

    
    if($pref == "all" && $like == "pop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='5' ORDER BY salary DESC, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "all" && $like == "pop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='5' ORDER BY salary, likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "all" && $like == "notpop" && $rika == "rich"){
        
        $sql = "SELECT * FROM users WHERE preference='5' ORDER BY salary DESC, likes LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "all" && $like == "notpop" && $rika == "poor"){
        
        $sql = "SELECT * FROM users WHERE preference='5' ORDER BY salary, likes LIMIT 5";
        fetchAndWrite($sql);

    }




}

// Preference och populära!!

else if (isset($_REQUEST['pref']) && isset($_REQUEST["like"])) {
    $pref = ($_REQUEST["pref"]);
    $like = ($_REQUEST["like"]);
    print("Pref och likes");

    if($pref == "male" && $like == "pop"){
  
        $sql = "SELECT * FROM users WHERE preference='1' ORDER BY likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "male" && $like == "notpop"){
  
        $sql = "SELECT * FROM users WHERE preference='1' ORDER BY likes ASC LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "female" && $like == "pop"){
  
        $sql = "SELECT * FROM users WHERE preference='2' ORDER BY likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "female" && $like == "notpop"){
  
        $sql = "SELECT * FROM users WHERE preference='2' ORDER BY likes LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "other" && $like == "pop"){
  
        $sql = "SELECT * FROM users WHERE preference='3' ORDER BY likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "other" && $like == "notpop"){
  
        $sql = "SELECT * FROM users WHERE preference='3' ORDER BY likes LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "both" && $like == "pop"){
  
        $sql = "SELECT * FROM users WHERE preference='4' ORDER BY likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "both" && $like == "notpop"){
  
        $sql = "SELECT * FROM users WHERE preference='4' ORDER BY likes LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "all" && $like == "pop"){
  
        $sql = "SELECT * FROM users WHERE preference='5' ORDER BY likes DESC LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "all" && $like == "notpop"){
  
        $sql = "SELECT * FROM users WHERE preference='5' ORDER BY likes LIMIT 5";
        fetchAndWrite($sql);

    }
}

// Preference och lönen!!
else if (isset($_REQUEST['pref']) && isset($_REQUEST["salary"])) {
    $pref = ($_REQUEST["pref"]);
    $rika = ($_REQUEST["salary"]);
    print("Pref och lön");
    
    if($pref == "male" && $rika == "rich"){
  
        $sql = "SELECT * FROM users WHERE preference='1' ORDER BY salary DESC LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "male" && $rika == "poor"){
  
        $sql = "SELECT * FROM users WHERE preference='1' ORDER BY salary LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "female" && $rika == "rich"){
  
        $sql = "SELECT * FROM users WHERE preference='2' ORDER BY salary DESC LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "female" && $rika == "poor"){
  
        $sql = "SELECT * FROM users WHERE preference='2' ORDER BY salary LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "other" && $rika == "rich"){
  
        $sql = "SELECT * FROM users WHERE preference='3' ORDER BY salary DESC LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "other" && $rika == "poor"){
  
        $sql = "SELECT * FROM users WHERE preference='3' ORDER BY salary LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "both" && $rika == "rich"){
  
        $sql = "SELECT * FROM users WHERE preference='4' ORDER BY salary DESC LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "both" && $rika == "poor"){
  
        $sql = "SELECT * FROM users WHERE preference='4' ORDER BY salary LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "all" && $rika == "rich"){
  
        $sql = "SELECT * FROM users WHERE preference='5' ORDER BY salary DESC LIMIT 5";
        fetchAndWrite($sql);

    }
    if($pref == "all" && $rika == "poor"){
  
        $sql = "SELECT * FROM users WHERE preference='5' ORDER BY salary LIMIT 5";
        fetchAndWrite($sql);

    }
}

// Bara preferencen!!
else if (isset($_REQUEST['pref'])) {
    $pref = ($_REQUEST["pref"]);

    print("Pref");
    

    if($pref == "male") {
        
        $sql = "SELECT * FROM users WHERE preference='1' LIMIT 5";
        fetchAndWrite($sql);

    }

    if($pref == "female") {
        
        $sql = "SELECT * FROM users WHERE preference='2' LIMIT 5"; 
        fetchAndWrite($sql);

    }

    if($pref == "other") {
        
        $sql = "SELECT * FROM users WHERE preference='3' LIMIT 5"; 
        fetchAndWrite($sql);

    }

    if($pref == "both") {
      
        $sql = "SELECT * FROM users WHERE preference='4' LIMIT 5"; 
        fetchAndWrite($sql);

    }

    if($pref == "all") {
        
        $sql = "SELECT * FROM users WHERE preference='5' LIMIT 5"; 
        fetchAndWrite($sql);

    }
}

// Om man inte tryckt filtrera 
else if (!isset($_REQUEST["salary"])) {
    
    $sql = "SELECT * FROM users LIMIT 5";
    fetchAndWrite($sql);

}



function fetchAndWrite($sql) {
    // Skapa databasuppkoppling
    $conn = create_conn();


    if ($result = $conn->query($sql)) {
        $pref = array("skrr", "Manliga", "Kvinnliga", "Annan", "Båda", "Alla");
        // Skapa en while loop för att hämta varje rad!
        while($row = $result->fetch_assoc()) {
            // Skirv ut endast ett värde (en kolumn en rad -- en cell)
            print("<p class='ad'>");
            
            
            print("Namn: " . $row['realname'] . "<br>");
            print("Preferens: " . $pref[$row["preference"]] ."<br>" );
            print("Bio: " . $row["bio"]. "<br>");
            
            
            if (isset($_SESSION["user"])) {
                print("Lön: " . $row["salary"]. "<br>");
                print("Mail: " . $row["email"]. "<br>");

                print("<br>".  "Likes: " . $row["likes"]. "<br>");
       
                print("<br>". "<a href='./profile.php?user=" .$row['username']."'>Kommentera eller ge en like!</a></p>");
                
            }  
        }

    } else {
        print("Något gick fel med query metoden :". $conn->error);
    }

}








