<?php
namespace luksaweeP\hw4\src\views\layouts;

include_once('src/views/view.php');
use luksaweeP\hw4\src\views\View as View;

class Layout {
  function jigsawLayout($view, $index, $strUploadText) {
    $jigsawView = new View();
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="src/styles/style.css">
      <title>Community Jigsaw</title>
    </head>
    <body>
      <h1>Community Jigsaw</h1>
    <?php
    $jigsawView->$view($index, $strUploadText);
    ?>
    </body>
    </html><?php
  }
}
