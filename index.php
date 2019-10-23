<html>
    <head>
        <title>Ticket Generator</title>
        <link rel="stylesheet" href="css/bootstrap.css"></link>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Generate Ticket</h1>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">
                    OPTIONS
                </div>
                <div class="panel-body">
                    <form class="form" action="process.php" method="get">
                        <label>JENIS TIKET :</label>
                        <?php
                            $images = glob("mentah/*.png");
                            foreach($images as $image){
                                $image = substr($image,7,count($image)-5);
                        ?>
                        <div class="row">
                            <div class="col-md-2">
                                <?php echo $image; ?>
                            </div>
                            <div class="col-md-1">
                                <input type="radio" value="mentah/<?php echo $image; ?>.png" name="img" class="form-control" required>
                            </div>
                            <div class="col-md-9">
                                <img src="mentah/<?php echo $image; ?>.png" height="200">
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label>HURUF KURSI :</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" maxlength="2" placeholder="Huruf Kursi" name="letter" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label>RANGE KURSI :</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" step="1" placeholder="Nomor awal" name="rstart" class="form-control" required>
                            </div>
                            <div class="col-md-1">
                                <label>HINGGA</label>
                            </div>
                            <div class="col-md-5">
                                <input type="number" step="1" placeholder="Nomor akhir" name="rstop" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Generate!" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>