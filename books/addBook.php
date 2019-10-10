<?php require('../templates/head.php')?>
<body>
    <?php require('../templates/header.php'); ?>

    <div class="container">
        <?php require('../templates/navbar.php');

        // these templates really need to be refactored!

        // var_dump($_POST);
        if ($_POST) {
            // don't refresh the page to check this - refreshing a page with a form automatically submits it!
            // var_dump('you have submitted the form.');

            // validation: we have to access the post's values using our php array object.

            extract($_POST); // extract() will create variables called title, author, etc.

            // var_dump($title);
            // var_dump($author);
            // var_dump($description);

            // empty() checks to see is a value is empty - i.e. whether or not it exists
            // strlen() just retrieves the lengt of a string

            $errors = array();

            if(empty($title)){
                // var_dump('field is empty.');
                array_push($errors, 'Please add a title.');
            } else if(strlen($title) < 5){
                // var_dump('strlen is less than five');
                array_push($errors, 'Please make sure that the title you\'ve entered has at least 5 characters.');
            } else if(strlen($title) > 100){
                // var_dump('strlen is more than a hundred');
                array_push($errors, 'Please make sure that the title you\'ve entered has less than 100 characters.');
            }

            if(empty($author)){
                // var_dump('field is empty.');
                array_push($errors, 'Please add an author name.');
            } else if(strlen($author) < 5){
                // var_dump('strlen is less than five');
                array_push($errors, 'Please make sure that the author name you\'ve entered has at least 5 characters.');
            } else if(strlen($author) > 100){
                // var_dump('strlen is more than a hundred');
                array_push($errors, 'Please make sure that the author name you\'ve entered has less than 100 characters.');
            }

            if(empty($year)){
                array_push($errors, 'The Year is empty, please add a value.');
            } else if(strlen($year) > 4 ){
                array_push($errors, 'The Year length must be less than 4 characters.');
            }


            if(empty($description)){
                // var_dump('field is empty.');
                array_push($errors, 'Please add a description name.');
            } else if(strlen($description) < 10){
                // var_dump('strlen is less than five');
                array_push($errors, 'Please make sure that the description you\'ve entered has at least 10 characters.');
            } else if(strlen($description) > 65535){
                // var_dump('strlen is more than the maximum possible');
                array_push($errors, 'Please do not write the whole book in the description field.');
            }


            if (empty($errors)) {
                // here, we need to 'escape the string'. We want to make sure that whatever's entered is converted to a string.
                // because we definitely don't want people injecting malicious code into our database!

                $safeTitle = mysqli_real_escape_string($dbc, $title);   // this takes two values - a DB connection, and the data to be converted
                // we'll often see redeclaration: $title = mysqli_real_escape_string($dbc, $title);
                $safeAuthor = mysqli_real_escape_string($dbc, $author);
                $safeYear = mysqli_real_escape_string($dbc, $year);
                $safeDescription = mysqli_real_escape_string($dbc, $description);

                // $sql = "INSERT INTO `Authors`(`name`) VALUES ('$safeAuthor')";
                // // double-quotes here, because we're going to be pasting a string in (from when we were testing the query in phpMyAdmin's SQL env)
                // $result = mysqli_query($dbc, $sql);    // mysqli_query needs two values - a database connection, and a query string
                //
                // if($result && mysqli_affected_rows($dbc) > 0){
                //     // if there's a result AND it's effected a row - think of this as shorthand for success() in AJAX
                //     // var_dump('Added an author.')
                //     $authorID = $dbc->insert_id;    // this gets us the ID attached to the most recent DB connection
                //                                     // which we need for our Books table, so we have an $authorID
                //
                // } else {
                //     die('Something went wrong adding the author.');
                // }

                $authorID = 1;       // here's a (valid, as in already in the DB) value for $authorID
                $bookSql = "INSERT INTO `Books`(`title`, `year`, `description`, `author_id`) VALUES ('$safeTitle',$safeYear,'$safeDescription','$authorID')";
                // die($bookSql);
                $booksResult = mysqli_query($dbc, $bookSql);
                if($booksResult && mysqli_affected_rows($dbc) > 0){
                    var_dump('successfully added the book');
                    // redirect to a page
                    header('Location:singleBook.php');  // doesn't use the base (is that a scope thing?)
                } else {
                    die('something went wrong adding the book');
                }

            }   // if($_POST)


        }
?>


        <div class="row mb-2">
            <div class="col">
                <h1>Add New Book</h1>
            </div>
        </div>

        <?php if (($_POST) && !empty($errors)):?>
            <!-- has something actually been posted? -->
            <!-- is there en error in the $errors array? -->
            <div class="row mb-2">
                <div class="col">
                    <div class="alert alert-danger pb-0" role="alert">
                        <ul>
                            <?php foreach ($errors as $error):?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row mb-2">
            <div class="col">
                <form action="./books/addBook.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                      <label for="title">Book Title</label>
                      <input type="text" class="form-control" name="title"  placeholder="E.g. 'The Wind in the Willows'" value="<?php if ($_POST){ echo $title; }; ?>">
                    </div>

                    <div class="form-group author-group">
                      <label for="author">Author</label>
                      <input type="text" autocomplete="off" class="form-control"  name="author" placeholder="E.g. 'Kenneth Grahame'" value="<?php if ($_POST){ echo $author; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="year">Year</label>
                      <input type="number" autocomplete="off" class="form-control"  name="year" placeholder="E.g. '1902'" max="<?php echo date('Y'); ?>" value="<?php if($_POST){ echo $year; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="description">Book Description</label>
                      <textarea class="form-control" name="description" rows="8" cols="80" placeholder="E.g. 'With the arrival of spring and fine weather outside, the good-natured Mole loses patience with spring cleaning ...'"><?php if ($_POST){ echo $description; }; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Upload an Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-outline-info btn-block">Submit</button>
                </form>
            </div>
        </div>

    </div>

<?php require('../templates/foot.php'); ?>
