<?php
session_start(); // Avvia la sessione per poter accedere alle variabili di sessione

// Verifica se la richiesta è di tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Includi il file domande.php
    include 'domande.php';

    // Ottieni la materia selezionata dall'utente
    $subject = $_POST['subject'];

    // Ottieni le domande relative alla materia
    $domande = getDomande($subject);

    // Inizializza le variabili per il punteggio e le risposte errate
    $punteggio = 0;
    $risposteErrate = array();

    // Recupera le risposte corrette dalla sessione
    $risposteCorrette = $_SESSION['risposte_corrette'];

    // Ciclo attraverso tutte le domande e confronta le risposte dell'utente con quelle corrette
    foreach ($domande as $indice => $domanda) {
        // Costruisco il nome dei campi di risposta e indice
        $campoRisposta = "risposta_" . $indice;
        $rispostaUtente = $_POST[$campoRisposta];
        $rispostaCorretta = $risposteCorrette[$indice]; // Ottieni la risposta corretta dall'array delle risposte corrette

        // Verifica se la risposta dell'utente è corretta
        if ($rispostaUtente === $rispostaCorretta) {
            // Se la risposta è corretta, incrementiamo il punteggio
            $punteggio++;
        } else {
            // Se la risposta è errata, la aggiungiamo all'array delle risposte errate
            $risposteErrate[] = array(
                'domanda' => $domanda['testo'],
                'risposta_utente' => $rispostaUtente,
                'risposta_corretta' => $rispostaCorretta
            );
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Risultati del Quiz</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            th {
                border-bottom: 2px solid #000;
            }
            td {
                border-bottom: 1px solid #000;
            }
            .correct {
                background-color: #8FED8F; /* Verde */
            }
            .wrong {
                background-color: #FF8F8F; /* Rosso */
            }
        </style>
    </head>
    <body>
        <h1>Risultati del Quiz</h1>
        <p>Il tuo punteggio è: <?php echo $punteggio; ?></p>
        <h2>Domande Errate</h2>
        <table>
            <thead>
                <tr>
                    <th>Domanda</th>
                    <th>Risposta Utente</th>
                    <th>Risposta Corretta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($risposteErrate as $rispostaErrata) : ?>
                    <tr class="wrong">
                        <td><?php echo $rispostaErrata['domanda']; ?></td>
                        <td><?php echo $rispostaErrata['risposta_utente']; ?></td>
                        <td><?php echo $rispostaErrata['risposta_corretta']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php">Torna alla selezione della materia</a>
    </body>
    </html>
    <?php
} else {
    // Se la richiesta non è di tipo POST, reindirizza alla pagina di selezione della materia
    header("Location: index.php");
    exit(); // Assicura che il codice venga terminato qui per evitare ulteriori output
}
?>
