<!-- 127.0.0.1:8000-->
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>Image Upload</title>
        <script src="script.js" defer></script>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <h1 class="title">Handwrite to Code</h1>
    <div>
        <a href="#" class="next" onclick="replace()">&#8250;</a>
    </div>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="myimage" class="box">
        <input type="submit" name="submit_image" value="Upload" class="box">
    </form>
    <div>
        <button onclick="replace()" class="draw">Draw</button>
    </div>
</body>
</html>