<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบออกใบเสร็จค่าเช่าห้อง</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background: #f1f1f1;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            cursor: pointer;
            font-size: 1em;
            margin-right: 10px;
        }
        .btn:hover {
            background-color: #555;
        }
        .icon {
            margin-right: 5px;
        }
        @media print {
        body {
            background: none;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .container {
            box-shadow: none;
            max-width: 100%;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #000;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #000;
        }
        th {
            background-color: #f2f2f2;
            color: #000;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        input, .btn {
            display: none;
        }
        .print-notes {
            font-family: inherit;
            font-size: inherit;
            border: none;
            padding: 0;
            resize: none;
            width: 100%;
            height: auto !important;
            background-color: transparent;
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">เจ้าสัว Arpartment</div>
        <form method="post" action="/print.php" target="_blank" id="form">
            <table>
                <tr>
                    <td colspan="3">
                        <label for="name"><strong>ชื่อผู้เช่า:</strong></label>
                        <input type="text" name="input[]" id="name" placeholder="กรอกชื่อผู้เช่าที่นี่">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label for="room"><strong>หมายเลขห้อง:</strong></label>
                        <input type="text" name="input[]" id="room" placeholder="กรอกหมายเลขห้องที่นี่">
                    </td>
                </tr>
                <tr>
                    <th>ลำดับ</th>
                    <th>รายการ</th>
                    <th>จำนวนเงิน</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ค่าน้ำ</td>
                    <td><input type="text" name="input[]" value="0" placeholder="กรอกจำนวนเงิน"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>ค่าไฟ</td>
                    <td><input type="text" name="input[]" value="0" placeholder="กรอกจำนวนเงิน"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>ค่าห้อง</td>
                    <td><input type="text" name="input[]" value="0" placeholder="กรอกจำนวนเงิน"></td>
                </tr>
                <tr>
                    <th colspan="2">รวมทั้งสิ้น</th>
                    <th><input type="text" name="input[]" value="0" placeholder="รวมจำนวนเงิน"></th>
                </tr>
                <tr>
                <td colspan="3" style="border: none; padding-top: 10px;">
                    <textarea name="input[]" class="print-notes" placeholder="**โอนเงินเข้าบัญชี ธ.กรุงไทย (ชื่อบัญชี คุณกรรณิกา กุลจินต์)เลขบัญชี 915-1-16412-4 เท่านั้น! (ชำระทุกวันที่ 1-5 นะคะ)
                    :" readonly>**โอนเงินเข้าบัญชี ธ.กรุงไทย (ชื่อบัญชี คุณกรรณิกา กุลจินต์)เลขบัญชี 915-1-16412-4 เท่านั้น! (ชำระทุกวันที่ 1-5 นะคะ):</textarea>
                    </td>
                        </tr>
                <tr>
                    <td colspan="3" style="text-align: right;">
                        <button type="button" class="btn" onclick="window.print();"><i class="fas fa-print icon"></i>พิมพ์</button>
                        <button type="button" class="btn" onclick="makePDF();"><i class="fas fa-file-pdf icon"></i>ดาวน์โหลด PDF</button>
                        <button type="button" class="btn" onclick="makeJPG();"><i class="fas fa-image icon"></i>ดาวน์โหลด JPG</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>