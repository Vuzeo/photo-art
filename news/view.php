<?php
session_start();
include("header.php");
include("connect.php");
$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}
$sql = "Select * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: index.php");
}

$hsql = "UPDATE posts SET hits = hits +1 WHERE id = '$id'";
mysqli_query($dbcon, $hsql);

$hsql = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$hits = mysqli_fetch_row($res);

$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$des = $row['description'];
$by = $row['posted_by'];
$hits = $row['hits'];
$time = $row['date'];

echo "<div class='row g-5'>";
echo "<div class='col-md-8'>";
echo "<div class='container'";
echo "<article class='blog-post'>";
echo "<div class='blog-post-title'>";
echo "<h3>$title</h3>";
echo "<p>";
echo '<div class="text-black col-md-8">';
echo "</p>";
echo "$des<br>";
echo '<p class="blog-post-meta text-black">';
echo "Posted by: " . $by . "<br>";
echo "Views: " . $hits[0] . "<br>";
echo "$time</div>";
echo "</p>";
echo "</article>";
echo '</div>';
echo '</div>';
?>


<?php
if (isset($_SESSION['username'])) {
    ?>
<div class="container">
    <div><a class="btn btn-warning" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
    </div>
    <div style="margin-left: 60px; margin-top: -35px">
        <a class="btn btn-danger" href="del.php?id=<?php echo $row['id']; ?>"
            onclick="return confirm('Are you sure you want to delete this post?'); ">Delete</a>
    </div>
</div>
<?php
}
echo '</div></div>';


include("footer.php");