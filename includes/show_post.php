<?php
// Fetch and display all posts
require_once 'dbh.inc.php';

$sql = "SELECT posts.message, posts.created_at, users.userUid
        FROM posts
        JOIN users ON posts.user_id = users.userId
        ORDER BY posts.created_at DESC";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo '<table>';
    echo '<tr><th>User</th><th>Message</th><th>Created At</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['userUid']) . '</td>';
        echo '<td>' . htmlspecialchars($row['message']) . '</td>';
        echo '<td>' . $row['created_at'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>No posts yet.</p>';
}
