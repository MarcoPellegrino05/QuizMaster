<?php
// Connessione al database
$servername = "localhost";
$username = "root"; // Sostituisci con il tuo nome utente del database
$password = ""; // Sostituisci con la tua password del database
$dbname = "domandedb"; // Sostituisci con il nome del tuo database

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Funzione per ottenere le domande da una determinata materia
function getDomande($materia) {
    global $conn;

    // Query per recuperare le domande e le risposte dal database
    $sql = "SELECT TestoDomanda, VeroFalso AS risposta FROM domande 
            INNER JOIN materie ON domande.MateriaID = materie.MateriaID 
            WHERE NomeMateria = '$materia'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $domande = array();

        while ($row = $result->fetch_assoc()) {
            $domande[] = array("testo" => $row["TestoDomanda"], "risposta" => $row["risposta"]);
        }

        return $domande;
    } else {
        echo "Nessuna domanda trovata per la materia $materia.";
    }
}

?>
