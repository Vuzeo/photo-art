<?php
session_start();
include("connect.php");
include("header.php");
include("security.php");
?>
<h2 class="container center">Admin Panel</h2>
<div class="container">
    <p>Welcome <?php echo $_SESSION['username']; ?></p>
    <a class="btn btn-secondary" href="new.php">Create new post</a>
    <p><a class="btn btn-danger" style="margin-top: 10px;" href="logout.php">Logout</a></p>
</div>
<h5 class="container">Posts</h5>
<?php
global $page;
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];
$rowsperpage = 5;
$totalpages = ceil($numrows / $rowsperpage);
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
}
if ($page > $totalpages) {
    $page = $totalpages;
}
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $rowsperpage;

$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if (mysqli_num_rows($result) < 1) {
    echo "No post found";
}
echo "<table class='container table table-bordered'>";
echo "<tr>";
echo "<th scope='col'>ID</th>";
echo "<th scope='col'>Title</th>";
echo "<th scope='col'>Date</th>";
echo "<th scope='col'>Views</th>";
echo "<th scope='col'>Action</th>";
echo "</tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $title = $row['title'];
    $by = $row['posted_by'];
    $time = $row['date'];
    $hits = $row['hits'];
    ?>

<tr>
    <td><?php echo $id; ?></td>
    <td><a href="view.php?id=<?php echo $id; ?>"><?php echo substr($title, 0, 50); ?></a></td>
    <td><?php echo $time; ?></td>
    <td><?php echo $hits; ?></td>
    <td><a href="edit.php?id=<?php echo $id; ?>">Edit</a> | <a href="del.php?id=<?php echo $id; ?>"
            onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
    </td>
</tr>

<?php
}
echo "</table>";
// pagination 
echo "<div class='container'>";
if ($page > 1) {
    echo "<a href='?page=1' class='btn btn-primary'><<</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='btn btn-secondary'><</a>";
}
$range = 3;
for ($i = ($page - $range); $i < ($page + $range) + 1; $i++) {
    if (($i > 0) && ($i <= $totalpages)) {
        if ($i == $page) {
            echo "<div class='btn btn-primary'> $i</div>";
        } else {
            echo "<a href='?page=$i' class='btn btn-secondary'>$i</a>";
        }
    }
}
if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a href='?page=$nextpage' class='w3-button'></a>";
    echo "<a href='?page=$totalpages' class='w3-btn'></a>";
}
echo "</div>";

include("footer.php");