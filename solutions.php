<?php 
require 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Övningar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>PHP Övningar vecka 5</h1>

<div class="grid-container">
<div class="grid-item">

Övning 1:<h2>DeleteUser</h2>
<?php
// Skriv ett PHP-skript som tar bort en användare från databasen baserat på användarens id. Visa ett meddelande när användaren är borttagen.

$id = 20;

$stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id', $id, );

if ($stmt->execute()) {
    echo "Användaren har tagits bort.";
} else {
    echo "Något gick fel.";
}



?>
</div>

<div class="grid-item">
Övning 2:<h2>CheckPasswordStrength</h2>
<?php
// Skriv ett PHP-skript för att kontrollera styrkan på ett lösenord (minst 8 tecken, minst en siffra, minst en stor bokstav).

function checkPasswordStrength($password) {
    if (strlen($password) >= 8 && preg_match('/[A-Z]/', $password) && preg_match('/\d/', $password)) {
        return true;
    }
    return false;
}

$password = "Exempel123";
if (checkPasswordStrength($password)) {
    echo "Lösenordet är starkt.";
} else {
    echo "Lösenordet är för svagt.";
}


?>
</div>

<div class="grid-item">
Övning 3:<h2>FormValidation</h2>
<?php
// Skriv ett PHP-skript som validerar ett användarformulär (t.ex. namn, e-post, lösenord) innan det sparas i databasen.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        echo "Alla fält måste fyllas i.";
    } else {
        // Här kan du lägga till kod för att spara användaren i databasen
        echo "Formuläret är korrekt.";
    }
}


?>

<form method="POST">
    Namn: <input type="text" name="name"><br>
    E-post: <input type="email" name="email"><br>
    Lösenord: <input type="password" name="password"><br>
    <input type="submit" value="Skicka">
</form>


</div>

<div class="grid-item">
Övning 4:<h2>GetAllUsers</h2>
<?php
// Skriv ett PHP-skript hämta alla användare från en databas och sedan sparar de till ett objekt

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach ($users as $user) {
    echo "Användarnamn: " . $user->name . "<br>";
}               

?>
</div>

<div class="grid-item">
Övning 5:<h2>DisplayUserProfile</h2>
<?php
// Skriv ett PHP-skript för att visa användarens profil baserat på information som lagras i databasen.

    $id = 1;

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    
    echo "Namn: " . $user->name . "<br>";
    echo "E-post: " . $user->email . "<br>";

?>
</div>

<div class="grid-item">
Övning 6:<h2>LogoutFunctionality</h2>
<?php
// Skriv ett PHP-skript som låter användaren logga ut genom att ta bort sessionen.
// session_unset();
// session_destroy();
// echo "Du har loggat ut.";

?>
</div>

<div class="grid-item">
Övning 7:<h2>SortUsersByName</h2>
<?php
// Skriv ett PHP-skript som hämtar alla användare från databasen och sorterar dem i alfabetisk ordning baserat på deras namn.

$query = ("SELECT * FROM users ORDER BY name ASC");
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach ($users as $user) {
    echo "Användarnamn: " . $user->name . "<br>";
}

?>
</div>

<div class="grid-item">
Övning 8:<h2>UpdateUserInfo</h2>
<?php
//Skriv ett PHP-skript som hämtar en användares information från databasen baserat på deras id och visar den i ett HTML-formulär så att användaren kan uppdatera sin data. Uppdatering behöver inte vara möjlig.

$id = 10;
$name = "Martin";
$email = "mail@yahoo.com";

$stmt = $conn->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();

echo "Användarens information har uppdaterats.";

?>
</div>

<div class="grid-item">
Övning 9:<h2>SearchUsers</h2>
<?php
//Skriv ett PHP-skript som simulerar en varukorg. När sidan uppdateras, ska produkten sparas i en session. Visa varukorgens innehåll på en annan sida. Nedan finns en länk till den andra sidan.


if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE name LIKE :search");
    $searchTerm = "%" . $search . "%";
    $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($users as $user) {
        echo "Användarnamn: " . $user->name . "<br>";
    }
}
?>
<form method="POST">
    Sök användare: <input type="text" name="search"><br>
    <input type="submit" value="Sök">
</form>



</div>

<div class="grid-item">
Övning 10:<h2>Pagination</h2>
<?php
// Skriv ett PHP-skript som implementerar paginering på en användarlista för att visa ett begränsat antal användare per sida.

$limit = 5; // Antal användare per sida
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$stmt = $conn->prepare("SELECT * FROM users LIMIT :limit OFFSET :offset");

$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach ($users as $user) {
    echo "Användarnamn: " . $user->name . "<br>";
}

echo "<a href='?page=" . ($page - 1) . "'>Föregående</a> | ";
echo "<a href='?page=" . ($page + 1) . "'>Nästa</a>";
?>
</div>


<div class="grid-item">
Övning 11:<h2>OOPinPHP</h2>
<?php
// Skapa en klass som heter user. Ge den alla properties som finns i din databas för users. Skapa även en konstruktor och använd $this-> för att sätta inparametrars värde till properties
//Skapa också en metod för att echo ut namnet på usern.

class User {
    public $id;
    public $name;
    public $email;

    public function __construct($id, $name, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function displayName() {
        echo "Användarnamn: " . $this->name;
    }
}

$user = new User(1, "John Doe", "john@example.com");
$user->displayName();
?>

</div>

<div class="grid-item">
Övning 12:<h2>DBToObjekt</h2>
<?php
// Skriv ett PHP-skript som hämtar en användare från databasen och skriver alla kolumner till ett User-objekt.


$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_OBJ);

class User2 {
    public $name;
    public $email;
    public $password;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

    }
}

$userObj = new User2($user->name, $user->email, $user->password);

print_r($userObj);
?>


</div>

<div class="grid-item">
Övning 13:<h2>ObjectToDB</h2>
<?php
// Gör samma sak fast omvänd ordning från förra uppgiften. Spara ett objekt som innehåller användarinformation till tabellen

$userObj = new User2("Jane Doe", "jane@example.com", "123");

$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
$stmt->bindParam(':name', $userObj->name, PDO::PARAM_STR);
$stmt->bindParam(':email', $userObj->email, PDO::PARAM_STR);
$stmt->bindParam(':password', $userObj->password, PDO::PARAM_STR);

//$stmt->execute();

echo "Written object to db!";

?>
</div>

<div class="grid-item">
Övning 14:<h2>DBtoObjectToArray</h2>
<?php
// Hämta alla users från databasen, gör om de till objekt och skriv de sedan till en array full med objekt.
?>
</div>

</div>
</div>
</body>
</html>