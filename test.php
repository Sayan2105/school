<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concatenate Text</title>
</head>
<body>
    <input type="text" id="textBar" placeholder="Enter text here">
    <select id="dropdown">
        <option value="Option1">Option 1</option>
        <option value="Option2">Option 2</option>
    </select>
    <button onclick="concatenateText('Button 1')">Button 1</button>
    <button onclick="concatenateText('Button 2')">Button 2</button>
    <p id="result"></p>

    <script>
        function concatenateText(buttonText) {
            const textBar = document.getElementById('textBar').value;
            const dropdown = document.getElementById('dropdown').value;
            const result = textBar + " " + dropdown + " " + buttonText;
            
            document.getElementById('result').textContent = result;
        }
    </script>
</body>
</html>
