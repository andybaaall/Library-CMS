<?php require('../templates/head.php') ?>
<body>
    <?php require('../templates/header.php'); ?>

    <div class="container">
        <?php require('../templates/navbar.php'); ?>


        <div class="row mb-2">
            <div class="col">
                <h1>Add New Movie</h1>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <div class="alert alert-danger pb-0" role="alert">
                    <ul>
                        <li>Error Message</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                      <label for="title">Movie Title</label>
                      <input type="text" class="form-control" name="title"  placeholder="E.g. 'Wild at Heart'" value="">
                    </div>

                    <div class="form-group author-group">
                      <label for="author">Director</label>
                      <input type="text" autocomplete="off" class="form-control"  name="author" placeholder="E.g. 'David Lynch'" value="">
                    </div>

                    <div class="form-group">
                      <label for="description">Movie Description</label>
                      <textarea class="form-control" name="description" rows="8" cols="80" placeholder="E.g. 'Young lovers Sailor and Lula run from the variety of weirdos that Lula's mom has hired to kill Sailor ... '"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="year">Year</label>
                      <input type="number" autocomplete="off" class="form-control"  name="year" placeholder="E.g. '1990'" max="<?php echo date('Y'); ?>" value="<?php if($_POST){ echo $year; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="year">Rutime (in minutes)</label>
                      <input type="number" autocomplete="off" class="form-control"  name="year" placeholder="E.g. '125'" max="<?php echo date('Y'); ?>" value="<?php if($_POST){ echo $year; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="genre">Genre</label>
                      <select class="form-control" name="genre">
                          <option name="genre" value="Vampire Mockumentary">Vampire Mockumentary</option>
                          <option name="genre" value="Road Movie with Car">Road Movie with Car</option>
                          <option name="genre" value="Splatter Flick">Splatter Flick</option>
                          <option name="genre" value="Netflix Reboot">Netflix Reboot</option>
                      </select>
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
