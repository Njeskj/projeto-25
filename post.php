<?php
include 'database.php';

function getPosts() {
    $conn = connectDB();
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
    $result = $conn->query($sql);
    $posts = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }

    $conn->close();
    return $posts;
}

function createPost($title, $content) {
    $conn = connectDB();
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);
    
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    $conn->query($sql);
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    createPost($title, $content);
    header("Location: index.php");
}
?>
