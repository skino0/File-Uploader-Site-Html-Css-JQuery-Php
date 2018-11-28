<html>
    <head>
        <title>Drag0n</title>
        <link rel="stylesheet" type="text/css" href="css/general.css">

        <style>
            #file {
                display:none;
            }
           
            #uploaded {
                border-radius: 2px;
                padding:10px;
                border: 2px solid crimson;
                width: 50%;
                height: 40px;
                position:absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                background:#000000;
                color:#fff;
                font-fmaily:monospace;
                font-size:15px;
                letter-spacing:.5px;
                z-index:2;

            }
        </style>
    </head>
    <body>
       <div id="bg"></div>
       <p id="uploaded"></p>
    </body>
</html>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileExtType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    if($_FILES['fileToUpload']['name'] != "") {
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        }else {
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 99999999) {
                echo "Sorry, your file is too large.";
            }else {
                // Allow certain file formats
                $allowed = array('jpg', 'jpeg', 'png', 'gif', 'zip', 'rar', 'exe');
                $image = array('jpg', 'jpeg', 'png','gif');
               
                if (in_array($fileExtType, $allowed)){
                    //Upload the file with a custom name!
                    $fileNameNew = "uploads/".basename($_FILES["fileToUpload"]["name"],".".$fileExtType).uniqid().".".$fileExtType;
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileNameNew)) {
                        echo '<p id="uploaded">The file '.basename( $_FILES["fileToUpload"]["name"]). 'has been uploaded.</p>';
                        echo "<p>Link: " . "https://drag0n.webline.ovh/" . $fileNameNew. '</p>';
                        if (in_array($fileExtType, $image)) {
                            echo '<br><br> ';
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }else {
                    echo "Sorry, only JPG, JPEG, PNG, GIF, ZIP & RAR files are allowed.";
                }
            }
        }
    }else {
        echo "Please select a file to upload!";
    }
}

// Check if file already exists
   
?>

