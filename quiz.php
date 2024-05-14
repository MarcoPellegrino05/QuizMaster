<?php
// Avvia la sessione
session_start();

// Includi il file domande.php
include 'domande.php';

// Ottieni la materia selezionata dall'utente
$subject = $_GET['subject'];

// Ottieni le domande relative alla materia
$domande = getDomande($subject);

// Inizializza l'array delle risposte corrette nella sessione
$_SESSION['risposte_corrette'] = array();

// Ciclo attraverso tutte le domande e aggiungi le risposte corrette all'array delle risposte corrette
foreach ($domande as $domanda) {
    $_SESSION['risposte_corrette'][] = $domanda['risposta'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - <?php echo $subject; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        p {
            margin-bottom: 20px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <h1>Quiz - <?php echo $subject; ?></h1>
    <form action="risultato.php" method="POST">
        <input type="hidden" name="subject" value="<?php echo $subject; ?>">
        <?php foreach ($domande as $indice => $domanda) : ?>
            <p><?php echo $domanda['testo']; ?></p>
            <input type="hidden" name="indice_<?php echo $indice; ?>" value="<?php echo $indice; ?>">
            <input type="radio" name="risposta_<?php echo $indice; ?>" value="vero"> Vero
            <input type="radio" name="risposta_<?php echo $indice; ?>" value="falso"> Falso
        <?php endforeach; ?>
        <h1> </h1>
        <button type="submit" formaction="risultato.php">Invia Risposte</button>
    </form>
</body>
</html>
