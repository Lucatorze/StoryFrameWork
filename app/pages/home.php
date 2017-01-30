<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h1>StoryFrameWork</h1>


<h2>List of story</h2>
<ul>
<?php

$session->clear();
session_destroy();
$files = glob(__DIR__.'/../../web/Ressources/story/*.*');

foreach($files as $file) {
    $file = pathinfo($file);
    echo "<li><a href='/game/".$file['filename']."/1'>".$file['filename']."</a></li>";
}

?>
</ul>
</body>
</html>