<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selezione della Materia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 10px;
        }

        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #45a049;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <h1>Seleziona la Materia</h1>
    <form action="quiz.php" method="GET">
        <div class="button-container">
            <button type="submit" name="subject" value="Storia">Storia</button>
            <button type="submit" name="subject" value="Letteratura">Letteratura</button>
            <button type="submit" name="subject" value="Inglese">Inglese</button>
            <button type="submit" name="subject" value="Informatica">Informatica</button>
        </div>
    </form>
</body>
</html>
