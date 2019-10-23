<html>
    <head>
        <title>Ticket Generator</title>
        <link rel="stylesheet" href="css/bootstrap.css"></link>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>View Ticket</h1>
            <hr>
            <div class="row">
            <?php
                $images = glob("hasil/*.jpg");
                sort($images, SORT_NATURAL);
                foreach($images as $image){
                    $nama = substr($image, 6, count($image)-5);
                    if($nama == $_GET['rstart']){
                        echo "</div><div class='row' style='background-color:#dffddf; padding-top:10px; padding-bottom:10px;'>";
                    }
            ?>
            <div class="col-md-6">
                <div class="thumbnail" id="<?php echo $nama; ?>">
                    <img src="<?php echo $image; ?>">
                    <div class="caption">
                        <h3><?php echo $nama; ?></h3>
                    </div>
                </div>
            </div>
            <?php
                    if($nama == $_GET['rstop']){
                        echo "</div><div class='row'>";
                    }
                }
            ?>
            </div>
            <div style="position:fixed; right:10px; top: 10px; background-color:#eee; padding: 10px; border-radius: 5px;">
                <a href="index.php" class="btn btn-primary">Generate more ticket</a><br><br>
                <button class="btn btn-success" id="dl"><span class="glyphicon glyphicon-download-alt"></span> Download all as zip</button>
            </div>
        </div>
        <iframe id="dlframe" style='display:none;'></iframe>
        <script>
            $("#dl").click(function(){
                $.ajax({
                    url: "arch.php"
                }).done(function(data){
                    $('#dlframe').attr({src: 'tickets.rar'});
                });
            });
        </script>
    </body>
</html>