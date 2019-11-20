<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'Lab7@3ser';
$dbname = 'world';


$query = filter_var(htmlspecialchars($_GET['country']),FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="result">
    <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
    </tr>
<?php foreach ($results as $row): ?>
   <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['continent'];?></td>
        <td><?= $row['independence_year'];?></td>
        <td><?=$row['head_of_state'];?></td>
    </tr>

<?php endforeach; ?>
</table>

