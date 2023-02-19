<?php
if (isset($_POST['image'])) {
    // should have read and write permission to the disk to write the JSON file
    $screenshotJson = fopen("screenshot.json", "a") or die("Unable to open screenshot.json file.");
    $existingContent = file_get_contents('screenshot.json');
    $contentArray = json_decode($existingContent, true);
    $screenshotImage = array(
        'imageURL' => $_POST['image']
    );
    $contentArray[] = $screenshotImage;
    $fullData = json_encode($contentArray);
    file_put_contents('screenshot.json', $fullData);
    fclose($screenshotJson);
}
?>