<!-- punteggio.php -->
<?php
// Includi il file domande.php
include 'domande.php';

// Calcola il punteggio totale in base alle risposte corrette salvate nella sessione
function calcolaPunteggio() {
    $punteggio = 0;
    // Se le risposte corrette sono salvate nella sessione, calcola il punteggio
    if (isset($_SESSION['risposte_corrette'])) {
        $risposte_corrette = $_SESSION['risposte_corrette'];
        foreach ($risposte_corrette as $risposta_corretta) {
            if ($risposta_corretta) {
                $punteggio++;
            }
        }
    }
    return $punteggio;
}

// Calcola e mostra il punteggio finale
$punteggio_finale = calcolaPunteggio();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punteggio Finale</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-top: 50px;
        }
        p {
            font-size: 24px;
            color: #555;
        }
        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Punteggio Finale</h1>
    <p>Il tuo punteggio finale è: <?php echo $punteggio_finale; ?></p>
    <a href="index.php">Torna alla selezione della materia</a>
</body>
</html>
