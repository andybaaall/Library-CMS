<?php require('../templates/head.php'); ?>

<body>
    <?php require('../templates/header.php');

    // var_dump($_GET);    // getting the id from the last request (ie. the request that got us to this page)
    $bookID = $_GET['id']; // square brackets were breaking the string below

    // $sql = "SELECT * FROM `Books` WHERE _id = $bookID";
    $sql = "SELECT Books.`_id` as bookID, `title`, `year`, `description`, Authors.name as author_name FROM `Books` INNER JOIN Authors ON Books.author_id = Authors._id WHERE Books._id = '$bookID'";

    $result = mysqli_query($dbc, $sql);

    // now we need to check a) whether the query ran or not and b) whether there's a row or not
    // if it didn't run, that's a 500 error
    // if it ran but didn't find a row, that's a 404 error
    // and if it ran and found a row, awesome.

    if ($result && mysqli_affected_rows($dbc) > 0) {
        // die('got a result');
        $singleBook = mysqli_fetch_array($result, MYSQLI_ASSOC);
        var_dump($singleBook);
    } else if ($result && mysqli_affected_rows($dbc) === 0){
        // die('404');
        header('Location: ../errors/404.php');
    } else {
        die('something went really wrong!');
    }
    ?>

    <div class="container">
        <?php require('../templates/navbar.php'); ?>

        <div class="row mb-2">
            <div class="col">
                <h1><?php echo $singleBook['title']; ?></h1>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <a class="btn btn-outline-primary" href="">Edit</a>
                <button class="btn btn-outline-danger" type="button" name="button" data-toggle="modal" data-target="#confirmModal">Delete</button>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12 col-sm-4 align-self-center">
                <img class="img-fluid" src="images/HarryPotter1.jpg" alt="">
            </div>
            <div class="col-12 col-sm-8 align-self-center">
                <h3><?php echo $singleBook['title']; ?></h3>
                <h4><?php echo 'author ID: ' . $singleBook['author_name']; ?></h4>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12">
                <p><?php echo $singleBook['description']; ?></p>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete <?php echo $singleBook['title']; ?>?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm Delete</button>
                </div>
            </div>
        </div>
    </div>

<?php require('../templates/foot.php'); ?>
