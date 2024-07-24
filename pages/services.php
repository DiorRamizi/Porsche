<html>
<head>
    <title>Porsche Services</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid ;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: gray;
        }
    </style>
</head>
<body>
      
<h1>Porsche Services</h1>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "porsche";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT s.service_id, s.service_name, s.description, s.date_created, c.cat_name
        FROM services s
        JOIN categories c ON s.category_id = c.category_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created</th>
                <th>Category</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['service_id']}</td>
                <td>{$row['service_name']}</td>
                <td>{$row['description']}</td>
                <td>{$row['date_created']}</td>
                <td>{$row['cat_name']}</td>
            </tr>";
    }

    echo "</table>";
    
} else {
    echo "0 results";
}


$conn->close();
?>

</body>
</html>