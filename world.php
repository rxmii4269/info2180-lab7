<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'Lab7@3ser';
$dbname = 'world';


$query = filter_var(htmlspecialchars($_GET['country']),FILTER_SANITIZE_STRING);
$query2 = filter_var(htmlspecialchars($_GET['context']),FILTER_SANITIZE_STRING);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if ($query2 === "cities"):?>
<?php $stmt = $conn->query("SELECT c.name, c.district, c.population FROM $query2 c JOIN countries cs ON c.country_code = cs.code WHERE 
cs.name = '$query'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>


<table class= 'results'>
    <tr>
        <th>Name</th>
        <th>District</th>
        <th>Population</th>
    </tr>
    <?php foreach ($results as $row):?>
    <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['district']; ?></td>
        <td><?= $row['population']; ?></td>
    </tr>
    <?php endforeach;?>
</table>


<?php else:?>
<?php $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%'");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
    
    <table class= 'results'>
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

<?php endif;?>



