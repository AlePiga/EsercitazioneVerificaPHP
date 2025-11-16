# PHP Cheatsheet

## Introduzione

PHP (Hypertext Preprocessor) è un linguaggio lato server che genera HTML dinamico ed è utilizzato per form, login, connessioni a database e gestione dello stato tramite sessioni e cookie.

---

## Sintassi base

```php
<?php
echo "Hello World!";
?>
```

### Commenti

```php
// commento singola riga
# altro commento
/*
commento multiriga
*/
```

---

## Variabili e tipi

```php
$nome = "Ale";
$eta = 18;
$altezza = 1.80;
$attivo = true;
```

Regole:

* iniziano con `$`
* non iniziano con numeri
* case-sensitive

Tipi principali:

* string
* int
* float
* boolean
* array
* object
* null

---

## Operatori

### Aritmetici

`+ - * / % **`

### Confronto

`== != === > < >= <=`

### Logici

`&& || !`

---

## Condizioni

```php
if ($x > 10) {
    ...
} elseif ($x == 10) {
    ...
} else {
    ...
}
```

### Switch

```php
switch($n){
  case 1: ...; break;
  default: ...;
}
```

---

## Cicli

```php
while(){ ... }
for($i=0; $i<10; $i++){ ... }
foreach($arr as $v){ ... }
```

---

## Array

### Normale

```php
$cars = ["Fiat", "BMW"];
```

### Associativo

```php
$user = [
  "email" => "ale@example.com",
  "password" => "1234"
];
```

### Multidimensionale

```php
$mat = [
  [1,2,3],
  [4,5,6]
];
echo $mat[1][2]; // 6
```

---

## Form GET e POST

### GET (dati visibili in URL)

```html
<form method="get" action="welcome.php">
  <input name="user">
</form>
```

```php
echo $_GET["user"];
```

### POST (dati nascosti)

```php
echo $_POST["user"];
```

---

## Superglobali

* `$_GET`
* `$_POST`
* `$_SESSION`
* `$_COOKIE`
* `$_SERVER`
* `$_FILES`

---

## Sessioni (fondamentale per il login)

Le sessioni salvano dati **sul server**.

### Avvio sessione

```php
session_start();
```

### Scrittura

```php
$_SESSION["user"] = "Ale";
```

### Lettura

```php
echo $_SESSION["user"];
```

### Logout

```php
session_start();
session_unset();
session_destroy();
```

### Sicurezza

```php
session_regenerate_id();
```

---

## Cookie

Salvati **nel browser**.

### Creazione

```php
setcookie("user", "Ale", time() + 86400, "/");
```

### Lettura

```php
echo $_COOKIE["user"];
```

### Differenze veloci

| Sessioni                          | Cookie                |
| --------------------------------- | --------------------- |
| Salvate sul server                | salvate nel browser   |
| Sicure                            | meno sicure           |
| Durano fino alla chiusura browser | durano finché scadono |

---

## Connessione al Database (MySQL)

```php
$conn = new mysqli("localhost", "root", "", "nomeDB");

if ($conn->connect_error) {
    die("Errore connessione");
}
```

---

## SELECT – Stampare dati dal database

```php
$sql = "SELECT id, firstname FROM utenti";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row["id"] . " - " . $row["firstname"] . "<br>";
    }
}
else {
    echo "0 risultati";
}
```

---

## INSERT – Inserire dati nel database (registrazione)

```php
$email = $_POST["email"];
$pw = $_POST["password"];

$sql = "INSERT INTO utenti (email,password) VALUES ('$email','$pw')";
$conn->query($sql);
```

---

## Sistema di Registrazione

### register.html

```html
<form action="register.php" method="post">
   <input name="email">
   <input name="password" type="password">
   <button type="submit">Registrati</button>
</form>
```

### register.php

```php
<?php
session_start();
$conn = new mysqli("localhost","root","","db");

$email = $_POST["email"];
$pw = $_POST["password"];

$sql = "INSERT INTO utenti (email,password) VALUES ('$email','$pw')";
$conn->query($sql);

header("Location: login.php");
exit();
```

---

## Sistema di Login

### form

```html
<form method="post" action="login.php">
   <input name="email">
   <input name="password" type="password">
</form>
```

### login.php

```php
<?php
session_start();
$conn = new mysqli("localhost","root","","db");

$email = $_POST["email"];
$pw = $_POST["password"];

$sql = "SELECT * FROM utenti WHERE email='$email' AND password='$pw'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION["user"] = $email;
    session_regenerate_id();
    header("Location: home.php");
    exit();
} else {
    header("Location: errore.php");
    exit();
}
```

---

## Redirect

```php
header("Location: home.php");
exit();
```

---

## File

### Leggere un file

```php
echo readfile("file.txt");
```

### fopen

```php
$fp = fopen("dati.txt", "r");
$line = fgets($fp);
fclose($fp);
```

---

## JSON

```php
json_encode($array);

$obj = json_decode($json);
```

---

## Database
### Classe Database
```php
<?php
class Database
{
    public $conn;
    public function __construct()
    {
        require_once 'config.php';
        $this->conn = new mysqli($servername, $username, $password, $db);
        $this->conn->set_charset("utf8");

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($query)
    {
        return $this->conn->query($query);
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}
```

### config.php

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "community";
```

---
## Spiegazione orale consigliata

> “HTTP è stateless, quindi non tiene memoria delle richieste. Le sessioni permettono di mantenere un utente loggato salvando i suoi dati sul server e usando un ID salvato in un cookie. I cookie invece salvano dati nel browser e non sono sicuri per password o info sensibili.”