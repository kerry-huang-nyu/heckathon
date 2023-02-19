<?php 
    if (isset($_POST['submit_image'])){

        $file = $_FILES['myimage'];
        
        $fileName = $_FILES['myimage']['name'];
        $fileTmpName = $_FILES['myimage']['tmp_name'];
        $fileSize = $_FILES['myimage']['size'];
        $fileError = $_FILES['myimage']['error'];
        $fileType = $_FILES['myimage']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)){
            if  ($fileError === 0){
                if ($fileSize < 5000000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: index.php?uploadsuccess");
                }
                else{
                    echo "Your file size is too big";
                }

            }
            else{
                echo "Error in uploading your file";
            }
        }
        else{
            echo "Cannot upload of this type";
        }

    }
?>