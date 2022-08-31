<?php
$attID = get_field('bikmo_custom_document_file'); // $_GET['attachment_id'];

$theFile = wp_get_attachment_url($attID);
$filePath = get_attached_file($attID);

if (!$theFile) {
    return;
}
//clean the fileurl
$file_url  = stripslashes(trim($theFile));
//get filename
$file_name = basename($theFile);
//get fileextension

$file_extension = pathinfo($file_name);
//security check
$fileName = strtolower($file_url);

$fileNameParts = explode('.', $fileName);

$whitelist = ['png', 'gif', 'tiff', 'jpeg', 'jpg', 'bmp', 'svg', 'pdf'];

if (!in_array(end($fileNameParts), $whitelist)) {
    exit('Invalid file!');
}
if (strpos($file_url, '.php') == true) {
    die("Invalid file!");
}

$file_new_name = $file_name;
$content_type = "";
//check filetype
switch ($file_extension['extension']) {
    case "png":
        $content_type = "image/png";
        break;
    case "gif":
        $content_type = "image/gif";
        break;
    case "tiff":
        $content_type = "image/tiff";
        break;
    case "jpeg":
    case "jpg":
        $content_type = "image/jpg";
        break;
    case "pdf":
        $content_type = "application/pdf";
        break;
    default:
        $content_type = "application/force-download";
}

// $content_type = apply_filters( "ibenic_content_type", $content_type, $file_extension['extension'] );


header("Expires: 0");
header("Cache-Control: no-cache, no-store, must-revalidate");
header('Cache-Control: pre-check=0, post-check=0, max-age=0', false);
header("Pragma: no-cache");
header("Content-type: {$content_type}");
// header("Content-Disposition:attachment; filename={$file_new_name}");
// header("Content-Type: application/force-download");

readfile("{$filePath}");
exit();
