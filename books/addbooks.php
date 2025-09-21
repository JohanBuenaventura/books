<?php

require_once "../classes/books.php";
$booksObj = new books();

$books = ["title"=>"","author"=>"","genre"=>"","publication_year"=>""];
$errors = ["title"=>"","author"=>"","genre"=>"","publication_year"=>""];

if($_SERVER["REQUEST_METHOD"] == "POST") {
$books["title"] = trim(htmlspecialchars($_POST["title"]));
$books["author"] = trim(htmlspecialchars($_POST["author"]));
$books["genre"] = trim(htmlspecialchars($_POST["genre"]));
$books["publication_year"] = trim(htmlspecialchars($_POST["publication_year"]));
}

if(empty($books["title"])) {
    $errors["title"] = "Title is Required";
}

if(empty($books["author"])) {
    $errors["author"] = "Author is Required";
}

if(empty($books["genre"])) {
    $errors["genre"] = "Please select a Genre";
}

if(empty($books["publication_year"])) {
            $error["publication_year"] = "Year Published is required";
    } elseif ($books["publication_year"] > 2025) {
    $error["publication_year"] = "Year Must not be in the future";
}

if(empty((array_filter($errors)))) {
    $booksObj->title = $books["title"];
    $booksObj->author = $books["author"];
    $booksObj->author = $books["author"];
    $booksObj->publication_year = $books["publication_year"];

    if($booksObj->addBooks()) {
        header("Location: viewbooks.php");
    } else {
        echo "failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books</title>
    <style>
        label {display: block;}
        .error, span {color: red; margin: 0;}
    </style>
</head>
<body>
      <h1>Add Books</h1>
    <label for="">Field with <span>*</span></label>
    <form action="" method="post">
        <label for="title">Title: </label>
        <input type="text" name="title" value="<?= $books["title"]?>">
        <p class="error"><?= $errors["title"]?></p>
        <label for="author">Author: </label>
        <input type="text" name="author" value="<?= $books["author"]?>">
        <p class="error"><?= $errors["author"]?></p>
        <label for="genre">Select Genre: </label>
        <select name="genre" id="genre">
            <option value="">--Select--</option>
            <option value="history" <?= $books["genre"] === "hitory"? 'selected' : '' ?>>History</option>
            <option value="science" <?= $books["genre"] === "science"? 'selected' : '' ?>>Science</option>
            <option value="fiction" <?= $books["genre"] === "fiction"? 'selected' : '' ?>>Fiction</option>
        </select>
        <p class="error"><?= $errors["genre"]?></p>
        <label for="publication_year">Publication Year: </label>
        <input type="date" name="publication_year" value="<?= $books["publication_year"]?>">
        <p class="error"><?= $errors["publication_year"]?></p>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
