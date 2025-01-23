<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hempel Paint Batch Expiry Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        #result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f3fe;
            border-radius: 4px;
        }
        #calculation-note {
            background-color: #f9f9f9;
            border-left: 4px solid #2196F3;
            padding: 10px;
            margin-top: 20px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hempel Paint Batch Expiry Calculator</h1>
        <form id="batchForm">
            <label for="batchNumber">Enter Batch Number:</label>
            <input type="text" id="batchNumber" name="batchNumber" required 
                   placeholder="e.g., 428090744" 
                   pattern="\d{9}" 
                   maxlength="9">
            
            <label for="expiryYears">Shelf Life (Years):</label>
            <select id="expiryYears" name="expiryYears">
                <option value="2">2 Years</option>
                <option value="3">3 Years</option>
                <option value="5">5 Years</option>
            </select>
            
            <button type="submit">Calculate Expiry Date</button>
        </form>
        
        <div id="result"></div>
        <div id="calculation-note" style="display:none;">
            <h3>How Calculation Works</h3>
            <p>Batch Number Breakdown:</p>
            <ul>
                <li><strong>First 2 digits (42):</strong> Production location code</li>
                <li><strong>3rd digit (8):</strong> Last digit of production year (2018)</li>
                <li><strong>4-5th digits (09):</strong> Production month (September)</li>
                <li><strong>Last 4 digits (0744):</strong> Unique batch identifier</li>
            </ul>
            <p>Expiry Calculation Steps:</p>
            <ol>
                <li>Determine production date from batch number</li>
                <li>Add selected shelf life years to production date</li>
                <li>Compare with current date to check validity</li>
            </ol>
            <p><em>Note: Actual shelf life may vary. Always consult product packaging or Hempel guidelines.</em></p>
        </div>
    </div>

    <script>
        document.getElementById('batchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            calculateExpiry();
        });

        function calculateExpiry() {
            const batchNumber = document.getElementById('batchNumber').value;
            const expiryYears = parseInt(document.getElementById('expiryYears').value);
            const resultDiv = document.getElementById('result');
            const noteDiv = document.getElementById('calculation-note');

            if (batchNumber.length !== 9) {
                resultDiv.innerHTML = '<p style="color:red;">Invalid batch number. Must be 9 digits.</p>';
                return;
            }

            // Extract information from batch number
            const productionLocation = batchNumber.substring(0, 2);
            const productionYear = 2000 + parseInt(batchNumber.charAt(2));
            const productionMonth = batchNumber.substring(3, 5);
            const batchCode = batchNumber.substring(5);

            // Calculate production date
            const productionDate = new Date(productionYear, parseInt(productionMonth) - 1, 1);
            
            // Calculate expiry date
            const expiryDate = new Date(productionDate);
            expiryDate.setFullYear(productionDate.getFullYear() + expiryYears);

            // Months array for readable month names
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June', 
                'July', 'August', 'September', 'October', 'November', 'December'
            ];

            // Prepare result HTML
            const resultHTML = `
                <h3>Batch Details</h3>
                <p><strong>Production Location:</strong> ${productionLocation}</p>
                <p><strong>Production Date:</strong> ${months[productionDate.getMonth()]} ${productionDate.getFullYear()}</p>
                <p><strong>Batch Code:</strong> ${batchCode}</p>
                <h3>Expiry Information</h3>
                <p><strong>Expiry Date:</strong> ${months[expiryDate.getMonth()]} ${expiryDate.getFullYear()}</p>
                <p style="color:${expiryDate > new Date() ? 'green' : 'red'}">
                    ${expiryDate > new Date() ? 'Product is within shelf life' : 'Product has expired'}
                </p>
            `;

            resultDiv.innerHTML = resultHTML;
            noteDiv.style.display = 'block';
        }
    </script>
</body>
</html>