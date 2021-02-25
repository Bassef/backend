<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <h1>Github </h1>
    <a href="https://github.com/Bassef/backend/tree/main/projekt2"> Github</a>
    <h1>1. Databasen </h1>
    <p> Uppgiften gjordes till den största delen redan på timmen, ända saken som jag implementerade var likes kolumnen in till users. Users innehåller all information som behövs för en användare att registrera sig. Comment tabellen har en id(som har slutligen på vår sida ingen skillnad), en comment och en profile_id. Profile_id och users id är den kopplar tabellerna. Om man skriver en kommentar in på profilen så om users id och profile_id är samma så hör den ihop. Id på både comments och users är på Auto Increment. <img src="img/rx7.png" width="900" height="400" ><img src="img/Untitled.png"></p>
    <h1>2. Användarhantering​ </h1>
    <p> Uppgiften var från början ganska krävande för att hela systemet med SQL och PHP koden var nytt. Det tog en stund att slippa i takten men efter uppgiften började jag förstå bättre hur systemet fungerar. Koden tar namnet och lösenordet från rutorna och kollar om det finns likadant konto i databasen. Lösenordet är hashat i databasen för att göra det ännu mera säkert.</p>
    
    <h1>3. Hämta data från databasen </h1>
    <p> Uppgiften var medelsvårt och göra på egenhand men via lektionerna fick jag en bra uppfattning vad som söktes. Vi gjorde ganska långt på uppgiften men några saker måste utföras på egenhand. Lärde mig hur jag begränsar resultaten och hur man döljer information av användaren som inte in loggad.</p>
    <h1>4. Mata in data i databasen  </h1>
    <p> Uppgiften var ganska svår från början men öppnades till mig efter en stund hur jag kunde utföra den. Problem som uppstod var att man kunde göra många profiler med samma email och användarnamn. Detta gick vi inte igenom på timmen och vet inte var det meningen att man skulle göra? Men fick slutligen det o fungera att den anmäler om användarnamnet eller mejlen är tagen. </p>
    <h1>5. Ta bort data från databasen </h1>
    <p> Uppgiften var ganska lätt och hade inte mycket kod i sig. Jag lärde mig hur DELETE fungerar och hur man kunde ta bort profiler av databasen från nätsidan. Svåra delen i uppgiften var att få lösenordinmatningen och fungera. Använde mig av inloggning koden som hjälp.</p>
    <h1>6.​​Ändra information i databasen </h1>
    <p> Uppgiften hade inget speciellt svåra delar utan var ganska enkel. Jag lärde mig hur UPDATE fungerar i SQL databasen. Svåra delen skulle ha varit att förstå/lista ut hur formuläret fylls men detta gick vi igenom på timmen. </p>
    <h1>7.​​Sortera och filtrera resultat </h1>
    <p> Uppgiften var ganska svår från början och tog mest tid. Men var slutligen till en stor del att copy paste sina egna if statments med en liten editering. Fick slutligen och fungera att man kunde använda bara en eller flera filtreringar. Preferensen är alltid i bruk men man kan välja vill man ta populäraste och rika eller bara en av dem. Svåraste delen i uppgiften var att hålla ögonen rakt utan att bli snurrig med koden. Problem som jag hade var att hade koden i fel ordning som gjorde att man inte kunde använda två filtreringar på samma tid. </p>
    <h1>8.​​Gilla / Ogilla </h1>
    <p> Uppgiften var ganska kort och hade inte så många speciellt svåra delar i sig. Gjorde bara två knappar som ena är like och andra unlike knappen. Sen används UPDATE för att uppdatera likena i databasen och sedan SELECT för att hämta antalet tillbaka till sidan</p>
    <h1>9. Chatt </h1>
    <p> Uppgiften var ganska kort men tog en stund att förstå hur den skulle utföras. Använda mig av INSTERT INTO för att implementera kommentaren till comment i databasen. Använde mig av användarens id som profile_id så att båda är samma. På detta sätt sätter den kommentaren i databasen och sedan tar den kommentaren tillbaka via id som är samma som profilens. </p>
    <h1>10. Feedback </h1>
    <p> Tycker att kursen har varit som en helhet bra! Jag gjorde projekt 1 för största delen tillsammans med Karim men beslöt oss att projekt 2 gör vi skilt. Förbättring som jag tycker att skulle kunna göras är att projekt 1 hade vi otroligt mycket tid och man hade inte mycket stress. När vi fick veta tidskravet till projekt 2 fick jag panikattack på hur lite tid vi hade. Så mera tid för projekt 2 som var mycket svårare än projekt 1. 
Har loggat 3 gånger per vecka från kursens början. Har bara inte använt mig av Clockify så har efteråt loggat in timmarna.
</p>
    

    


</article>




<?php include "footer.php" ?>