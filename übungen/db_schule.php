<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_schule";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the search term from the form input
  $searchTerm = $_POST["search"];

  // Write the SQL query with the search condition
  $sql = "SELECT *
          FROM tbl_lehrer
          JOIN tbl_klasse ON ID_Klasse = ID_Klasse
          WHERE Vorname LIKE '%$searchTerm%' OR Nachname LIKE '%$searchTerm%'";

  // Execute the query
  $result = mysqli_query($conn, $sql);
}
?>

<!-- HTML form -->
<form method="post" action="">
  <input type="text" name="search" placeholder="Search Lehrer">
  <button type="submit">Search</button>
</form>

<!-- Display the search results in a table -->
<?php if (isset($result) && mysqli_num_rows($result) > 0): ?>
  <table>
    <tr>
      <th>Lehrer ID</th>
      <th>Lehrer Vorname</th>
      <th>Lehrer Nachname</th>
      <th>Klasse ID</th>
      <th>Klassenname</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row["ID_Lehrer"]; ?></td>
        <td><?php echo $row["Vorname"]; ?></td>
        <td><?php echo $row["Nachname"]; ?></td>
        <td><?php echo $row["ID_Klasse"]; ?></td>
        <td><?php echo $row["Klassen_Name"]; ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
<?php elseif (isset($result) && mysqli_num_rows($result) === 0): ?>
  <p>Keine Ergebnisse gefunden!</p>
<?php endif; ?>

<?php mysqli_close($conn); ?>
