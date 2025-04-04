<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        header {
            background-color: #333;
            color: white;
            padding: 15px;
        }
        .container {
            margin: 20px;
            padding: 20px;
        }
        button {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #005f73;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to My Simple Website</h1>
    </header>
    <div class="container">
        <p>This is a basic webpage with HTML, CSS, and JavaScript.</p>
        <button onclick="showMessage()">Click Me</button>
    </div>
    <div class="home">
        <h2>Home</h2>
        <p>Welcome to the home page of this simple website.</p>
        <p>Feel free to explore and click the button above!</p>
        <a href="/">home</a>
    </div>
    <script>
        function showMessage() {
            alert("Hello! Thanks for visiting.");
        }
    </script>
</body>
</html>
