<?php
$host = 'localhost'; // หรือ IP Address ของ server ที่ hosting ฐานข้อมูล
$username = 'root'; // ชื่อผู้ใช้ฐานข้อมูล
$password = ''; // รหัสผ่าน
$database = 'apartmert_manage'; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($host, $username, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สรุปยอดค่าน้ำ-ค่าไฟ</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt:400,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin: 40px 0;
        }
        form {
            max-width: 500px;
            margin: 0 auto 20px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        label {
            font-weight: bold;
            margin-right: 10px;
        }
        select, button {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 16px;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        #summaryResult {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1><i class="fas fa-chart-line"></i> สรุปยอดค่าน้ำ-ค่าไฟ</h1>
    <form id="summaryForm" style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap;">
        <label for="month"><i class="fas fa-calendar-alt"></i> เลือกเดือน:</label>
        <select id="month">
            <option value="01">มกราคม</option>
            <option value="02">กุมภาพันธ์</option>
            <option value="03">มีนาคม</option>
            <option value="04">เมษายน</option>
            <option value="05">พฤษภาคม</option>
            <option value="06">มิถุนายน</option>
            <option value="07">กรกฎาคม</option>
            <option value="08">สิงหาคม</option>
            <option value="09">กันยายน</option>
            <option value="10">ตุลาคม</option>
            <option value="11">พฤศจิกายน</option>
            <option value="12">ธันวาคม</option>
        </select>
        <label for="year"><i class="fas fa-calendar"></i> เลือกปี:</label>
        <select id="year"></select>
        <button type="submit"><i class="fas fa-search"></i> แสดงสรุป</button>
    </form>
    <div id="summaryResult"></div>

    <script>
        // Populate years dropdown list
        const currentYear = new Date().getFullYear();
        const yearSelect = document.getElementById('year');
        for (let year = currentYear; year >= currentYear - 1; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }

        document.getElementById('summaryForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const selectedMonth = document.getElementById('month').value;
            const selectedYear = document.getElementById('year').value;

            // Send AJAX request to fetch data from the server
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_summary.php?month=' + selectedMonth + '&year=' + selectedYear, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('summaryResult').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });
    </script>
</body>
</html>
