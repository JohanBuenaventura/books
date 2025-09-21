<?php
require_once "../classes/books.php";

$booksObj = new books();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
</head>
<body>
    <h1>Books Lists</h1>
    <button><a href="addbooks.php">Add Books</a></button>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Publication Year</th>
        </tr>
        <?php
        foreach( $booksObj->viewBooks() as $book) {
            ?>
            <tr>
                <td><?= $book["id"] ?></td>
                <td><?= $book["title"] ?></td>
                <td><?= $book["author"] ?></td>
                <td><?= $book["genre"] ?></td>
                <td><?= $book["publication_year"] ?></td>
            </tr>
            <?php
        }
        ?>

    </table>
    
</body>
</html>
