<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Calculator</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS file -->
</head>
<body>
    <div class="calculator">
        <input type="text" id="display" placeholder="0" disabled>
        <div class="button-container">
          
            <button onclick="appendToDisplay('/')">÷</button>
            <button onclick="clearDisplay()">C</button>
            <button class="delete-btn" onclick="deleteLastCharacter()">Del</button>
            <button onclick="appendToDisplay('*')">*</button>
            <button onclick="appendToDisplay('7')">7</button>
            <button onclick="appendToDisplay('8')">8</button>
            <button onclick="appendToDisplay('9')">9</button>
            <button onclick="appendToDisplay('-')">-</button>
            <button onclick="appendToDisplay('4')">4</button>
            <button onclick="appendToDisplay('5')">5</button>
            <button onclick="appendToDisplay('6')">6</button>
            <button onclick="appendToDisplay('+')">+</button>
            <button onclick="appendToDisplay('1')">1</button>
            <button onclick="appendToDisplay('2')">2</button>
            <button onclick="appendToDisplay('3')">3</button>
            <button onclick="appendToDisplay('.')">.</button>
            <button onclick="appendToDisplay('0')">0</button>
            <button rowspan="2" onclick="calculateResult()">=</button>
        </div>
    </div>

    <script>
        function appendToDisplay(value) {
            const display = document.getElementById('display');
            if (display.value === '0' && value !== '/') {
                display.value = value;
            } else {
                display.value += value;
            }
        }

        function clearDisplay() {
            document.getElementById('display').value = '0';
        }

        function deleteLastCharacter() {
            const display = document.getElementById('display');
            display.value = display.value.slice(0, -1) || '0'; 
        }

        function calculateResult() {
            const display = document.getElementById('display');
            try {
                display.value = eval(display.value) || '0';
            } catch {
                display.value = 'Error';
            }
        }
    </script>
</body>
</html>