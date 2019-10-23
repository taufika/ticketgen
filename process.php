<?php
    $letter = $_GET['letter'];
    $rstart = $_GET['rstart'];
    $rstop = $_GET['rstop'];
    $img = $_GET['img'];

    for($i = $rstart; $i <= $rstop; $i++){
        // Create Image From Existing File
        $jpg_image = imagecreatefrompng($img);
        $prefix = substr($img,7,8);

        // Allocate A Color For The Text
        if(strpos($img,"VIP") !== false){
            $color = imagecolorallocate($jpg_image, 255, 255, 255);
        } else {
            $color = imagecolorallocate($jpg_image, 0, 0, 0);
        }

        // Set Path to Font File
        $font_path = 'Aller_Rg.ttf';

        // Set Text to Be Printed On Image
        $text = $letter.$i;

        // Print nomor kiri
        imagettftext($jpg_image, 55, 0, 260, 610, $color, $font_path, $text);
        // Print nomor kanan
        imagettftext($jpg_image, 70, 45, 3080, 790, $color, $font_path, $text);

        // Send Image to Browser
        imagejpeg($jpg_image,"hasil/".$prefix.$letter.$i.".jpg",1000);

        // Clear Memory
        imagedestroy($jpg_image);
    }
    header("location: view.php?rstart=".$prefix.$letter.$rstart."&rstop=".$prefix.$letter.$rstop."#".$prefix.$letter.$rstart);
?>