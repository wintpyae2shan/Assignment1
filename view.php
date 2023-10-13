<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Subscribers List</title>
    <style>
        body {
            background-color: palegreen;
            color: black;
            font-family: 'Inconsolata', monospace;
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        .subscribers-container {
            padding: 10px;
        }

        nav {
            margin-top: 10px;
            padding: 10px;
        }

        nav a {
            background-color: green;
            margin-top: 10px;
            text-decoration: none;
            border-radius: 10px;
            padding: 10px;
        }

        nav a:hover {
            color: white;
        }

        nav a:visited {
            color: palegreen;
        }
    </style>
</head>

<body>
    <header>
        <h2>Subscribers</h2>
    </header>
    <div class="subscribers-container">
        <table>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <?php

            require_once('database.php');
            $query = "SELECT * FROM sublist";
            $result = $conn->query($query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['username']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['password']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "Access denied" . mysqli_error($conn);
            }
            mysqli_close($conn);
            ?>
        </table>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </div>
</body>

</html>