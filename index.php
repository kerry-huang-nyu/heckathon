<!-- 127.0.0.1:8000-->
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>HTC</title>
        <script src="script.js" defer></script>
        <link rel="stylesheet" href="style.css">
    </head>
<body class="background">
    <h1 class="title">Handwriting to Code</h1>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>      
    <div id="align-left">
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <input type="file" name="myimage" class="file-button">
            <input type="submit" name="submit_image" value="Upload" class="upload-button">
        </form>
    </div>
    <div id="align-right">
        <button onclick="replace()" class="draw-button">Draw</button>
    </div>
</body>
</html>