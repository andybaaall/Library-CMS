<?php require('../templates/head.php'); ?>

<body>
    <?php require('../templates/header.php');

    $sql = "SELECT `_id`, `title` FROM `Books` WHERE 1";
    $result = mysqli_query($dbc, $sql);
    // var_dump($result);  // this gets us the result of the query, not the rows and their contents.
                        // it looks like object(mysqli_result)#9 (5) { ["current_field"]=> int(0) ["field_count"]=> int(2) ["lengths"]=> NULL ["num_rows"]=> int(4) ["type"]=> int(0) }

    if($result){  // this time, we don't mind if the query returns empty
        $allBooks = mysqli_fetch_all($result, MYSQLI_ASSOC);
        var_dump($allBooks);
        // now we're getting the stuff we've asked for!
        // fetch_all is turning everything that comes back into an associative array
        // but if nothing comes back, $allBooks
    } else {
        die('something went wrong getting $allBooks');
    }

    ?>

    <div class="container">
        <?php require('../templates/navbar.php');?>


        <div class="row mb-2">
            <div class="col">
                <h1>All Books</h1>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <a class="btn btn-outline-primary" href="books/addBook.php">Add new Book</a>
            </div>
        </div>

        <div class="row d-flex">

            <?php if ($allBooks): ?>
            <!-- triggers if the $allBooks array has any contents; we're not testing whether or not it just exists -->
                <?php foreach ($allBooks as $singleBook): ?>
                    <div class="col-12 col-md-3">
                         <div class="card mb-4 shadow-sm h-100">
                             <img class="card-img-top" src="images/HarryPotter1.jpg" alt="Card image cap">
                             <div class="card-body">
                                 <p class="card-text"><?php echo $singleBook['title']; ?></p>
                                 <div class="d-flex justify-content-between align-items-center">
                                     <div class="btn-group">
                                         <a href="books/singleBook.php?id=<?php echo $singleBook['_id']; ?>" class="btn btn-sm btn-outline-info">View</a>
                                         <a href="books/addBook.php?id=<?php echo $singleBook['_id']; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                <?php endforeach; ?>


            <?php else: ?>
            <!-- triggers if there aren't any books -->
                <div class="col-12">
                    <p>Uh-oh, looks like there aren't any books in the library yet.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php require('../templates/foot.php'); ?>
