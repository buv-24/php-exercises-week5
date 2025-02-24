<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Övningar</title>
    <style>
        h2 {
            margin:0px;
            font-size: 1.1rem;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 1px;
            text-align: left;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .grid-item {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>PHP Övningar vecka 5</h1>

<div class="grid-container">
<div class="grid-item">

Övning 1:<h2>DeleteUser</h2>
<?php
// Skriv ett PHP-skript som tar bort en användare från databasen baserat på användarens id. Visa ett meddelande när användaren är borttagen.
?>
</div>

<div class="grid-item">
Övning 2:<h2>CheckPasswordStrength</h2>
<?php
// Skriv ett PHP-skript för att kontrollera styrkan på ett lösenord (minst 8 tecken, minst en siffra, minst en stor bokstav).
?>
</div>

<div class="grid-item">
Övning 3:<h2>FormValidation</h2>
<?php
// Skriv ett PHP-skript som validerar ett användarformulär (t.ex. namn, e-post, lösenord) innan det sparas i databasen.
?>
</div>

<div class="grid-item">
Övning 4:<h2>FileUpload</h2>
<?php
// Skriv ett PHP-skript hämta alla användare från en databas och sedan sparar de till ett objekt
?>
</div>

<div class="grid-item">
Övning 5:<h2>DisplayUserProfile</h2>
<?php
// Skriv ett PHP-skript för att visa användarens profil baserat på information som lagras i databasen.
?>
</div>

<div class="grid-item">
Övning 6:<h2>LogoutFunctionality</h2>
<?php
// Skriv ett PHP-skript som låter användaren logga ut genom att ta bort sessionen.
?>
</div>

<div class="grid-item">
Övning 7:<h2>SortUsersByName</h2>
<?php
// Skriv ett PHP-skript som hämtar alla användare från databasen och sorterar dem i alfabetisk ordning baserat på deras namn.

?>
</div>

<div class="grid-item">
Övning 8:<h2>UpdateUserInfo</h2>
<?php
// Skriv ett PHP-skript som uppdaterar en användares information (t.ex. namn, e-post) baserat på användarens id.
?>
</div>

<div class="grid-item">
Övning 9:<h2>SearchUsers</h2>
<?php
// Skriv ett PHP-skript för att söka efter användare i databasen baserat på ett namn eller e-postadress.
?>
</div>

<div class="grid-item">
Övning 10:<h2>Pagination</h2>
<?php
// Skriv ett PHP-skript som implementerar paginering på en användarlista för att visa ett begränsat antal användare per sida.
?>

<div class="grid-item">
Övning 11:<h2>OOPinPHP</h2>
<?php
// Skapa en klass som heter user. Ge den alla properties som finns i din databas för users. Skapa även en konstruktor och använd $this-> för att sätta inparametrars värde till properties
//Skapa också en metod för att echo ut namnet på usern.
?>

<div class="grid-item">
Övning 12:<h2>ObjectToDB</h2>
<?php
// Skriv ett PHP-skript som hämtar en användare från databasen och skriver alla kolumner till ett User-objekt.
?>

<div class="grid-item">
Övning 13:<h2>ObjectToDB</h2>
<?php
// Gör samma sak fast omvänd ordning från förra uppgiften. Spara ett objekt som innehåller användarinformation till tabellen
?>

<div class="grid-item">
Övning 14:<h2>DBtoObjectToArray</h2>
<?php
// Hämta alla users från databasen, gör om de till objekt och skriv de sedan till en array full med objekt.
?>

</div>
</div>
</body>
</html>