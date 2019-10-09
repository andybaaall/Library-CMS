<?php require('../templates/head.php'); ?>

<body>
    <?php require('../templates/header.php'); ?>

    <div class="container">
        <?php require('../templates/navbar.php'); ?>

        <div class="row mb-2">
            <div class="col">
                <h1>Wild at Heart</h1>
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
                <h3>Wild at Heart</h3>
                <h4>J K Rowling</h4>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12">
                <p>Young lovers Sailor and Lula run from the variety of weirdos that Lula's mom has hired to kill Sailor.</p>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete Wild at Heart</h5>
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
