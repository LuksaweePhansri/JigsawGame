<?php
namespace luksaweeP\hw4\src\controllers;
define("RANDOMIND", "src/resources/active_image.txt");

include_once('src/models/model.php');
use luksaweeP\hw4\src\models\Model as model;
include_once('src/views/layouts/layout.php');
use luksaweeP\hw4\src\views\layouts\Layout as Layout;
include_once('src/models/monolog.php');
use luksaweeP\hw4\src\models\monolog\Monolog as Monolog;

class Controller {
  function jigsawController() {
    if(isset($_POST["upload"])) {
      $layout = new Layout();
      $model = new Model();
      $strUploadText = $model->uploadImgToServer();
      $index = $model->getJigsawInd();
      $layout->jigsawLayout("jigsawView", $index, $strUploadText);
      $monolog = new Monolog();
      $monolog->updateJigsawLog();
    } else {
      $layout = new Layout();
      $model = new Model();
      $index = $model->getJigsawInd();
      $strUploadText = "Click to select new Image";
      $layout->jigsawLayout("jigsawView", $index, $strUploadText);
    }
  }
}
