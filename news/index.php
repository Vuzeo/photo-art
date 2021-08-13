<?php
include("header.php");
include("connect.php");
?>

<?php
// COUNT 
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];
global $page;

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
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">Nothing to display</div>';
}
while ($row = mysqli_fetch_assoc($result)) {

    $id = htmlentities($row['id']);
    $title = htmlentities($row['title']);
    $des = htmlentities($row['description']);
    $time = htmlentities($row['date']);

    echo '<div class="container"';
    echo '<div class="row mb-2">';
    echo '<div class="col-md-6">';
    echo '<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">';
    echo '<div class="col p-4 d-flex flex-column position-static">';
    echo '<div class="col-md-8">';
    echo "<a><h3 class='card-title' href='view.php?id=$id'>$title</h3></a>";

    echo substr($des, 0, 100);

    echo '<p><div class="blog-post-meta"></p>';
    echo "<a class='btn btn-light' href='view.php?id=$id'>Read more...</a>";

    echo '</div> <div class="text-grey">';
    echo "$time</div>";
    echo "</article>";
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}


echo "<div class='p-4'>";
echo "<div class='position-sticky' style='top: 2rem;'>";
echo "<div class='p-4 mb-3 bg-light rounded'>";
if ($page > 1) {
    echo "<a href='?page=1'>&laquo;</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='btn btn-primary'><</a>";
}
$range = 5;
for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
    if (($x > 0) && ($x <= $totalpages)) {
        if ($x == $page) {
            echo "<div class='btn btn-primary'>$x</div>";
        } else {
            echo "<a href='?page=$x' class='btn btn-primary'>$x</a>";
        }
    }
}

if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a href='?page=$nextpage' class='w3-button'>></a>";
    echo "<a href='?page=$totalpages' class='w3-btn'>&raquo;</a>";
}
echo "</div>";
include("footer.php");