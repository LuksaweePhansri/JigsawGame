<?php
namespace luksaweeP\hw4\src\views;

class View {
  function jigsawView($index, $strUploadText) {
    if(count($index) == 0) {
      $index = [0, 1, 2, 3, 4, 5, 6, 7, 8];
    }
    ?>
    <form name="myForm" id="myForm" action="index.php" method="post" enctype="multipart/form-data">
      <div class="uploadImg">
        <label for="img">New Image: </label>
        <input class="fileSelector" type="file" accept="image/jpg, image/png, image/gif" name="img" id="img" onchange="loadImg(event)" >
        <button class="selectImgButton" type="button" id="selectImgButton" name="selectImgButton"
        for="img" onclick="clickSelectImg(event)"><?php echo $strUploadText ?></button>
        <input class="upload" type="submit" name="upload" id="upload" value="Upload">
        <p id="check" name="check"></p>
      </div>
      <div>
        <img src="src/resources/active_image.jpg" class="showImg" id="output" />
        <canvas class="tile" name="tile0" id="tile0" width="120" height="120" status="false" ind="0" jigsawInd="0" onclick="selectTile(id); q.enqueue(id); q.swap();"></canvas></canvas>
        <canvas class="tile" name="tile1" id="tile1" width="120" height="120" status="false" ind="1" jigsawInd="0" onclick="selectTile(id); q.enqueue(id); q.swap();"></canvas></canvas>
        <canvas class="tile" name="tile2" id="tile2" width="120" height="120" status="false" ind="2" jigsawInd="0" onclick="selectTile(id); q.enqueue(id); q.swap();"></canvas></canvas>
      </div>
      <div>
        <canvas class="tile" name="tile3" id="tile3" width="120" height="120" status="fasle" ind="3" jigsawInd="0" onclick="selectTile(id); q.enqueue(id); q.swap();"></canvas></canvas>
        <canvas class="tile" name="tile4" id="tile4" width="120" height="120" status="false" ind="4" jigsawInd="0" onclick="selectTile(id); q.enqueue(id); q.swap();"></canvas></canvas>
        <canvas class="tile" name="tile5" id="tile5" width="120" height="120" status="false" ind="5" jigsawInd="0" onclick="selectTile(id); q.enqueue(id); q.swap();"></canvas></canvas>
      </div>
      <div>
        <canvas class="tile" name="tile6" id="tile6" width="120" height="120" status="false" ind="6" jigsawInd="0" onclick="selectTile(id); q.enqueue(id); q.swap();"></canvas></canvas>
        <canvas class="tile" name="tile7" id="tile7" width="120" height="120" status="false" ind="7" jigsawInd="0" onclick="selectTile(id); q.enqueue(id); q.swap();"></canvas></canvas>
        <canvas class="tile" name="tile8" id="tile8" width="120" height="120" status="false" ind="8" jigsawInd="0" onclick="selectTile(id); q.enqueue(id); q.swap();"></canvas></canvas>
      </div>
      <p id="demo"></p>
    </form>
    <?php
    if(($strUploadText == "Successful file Upload") || ($strUploadText == "Click to select new Image")) {
      ?>
      <script>
      document.getElementById('selectImgButton').style.color = "black";
      </script>
      <?php
    } else {
      ?>
      <script>
      document.getElementById('selectImgButton').style.color = "red";
      </script>
      <?php
    }
    ?>

    <script>
    // open file
    function clickSelectImg(event) {
      var file = document.getElementById("img").click();
    }

    // upload picture to image
    function loadImg(event) {
      var image = document.getElementById("output");
      image.src = URL.createObjectURL(event.target.files[0]);
      if(event.target.files[0].size > 2000000){
        alert("File too large!! Maximum size is 2MB.");
        document.getElementById('selectImgButton').innerHTML = "File too large! Click to select new File";
        document.getElementById('selectImgButton').style.color = "red";
        image.src = "src/resources/active_image.jpg";
      } else {
        document.getElementById('selectImgButton').innerHTML = "Successful, Time to click Upload";
        document.getElementById('selectImgButton').style.color = "blue";
      }
    }

    // set jigsaw index from active_image.txt to jigsawInd
    function setLoadJigsawind() {
      var jigsawInd = [9];
      jigsawInd[0] = <?=$index[0];?>;
      jigsawInd[1] = <?=$index[1];?>;
      jigsawInd[2] = <?=$index[2];?>;
      jigsawInd[3] = <?=$index[3];?>;
      jigsawInd[4] = <?=$index[4];?>;
      jigsawInd[5] = <?=$index[5];?>;
      jigsawInd[6] = <?=$index[6];?>;
      jigsawInd[7] = <?=$index[7];?>;
      jigsawInd[8] = <?=$index[8];?>;
      return jigsawInd;
    }

    // change border of selected tile
    function selectTile(id) {
      var mystyle = document.getElementById(id);
      //console.log(mystyle);
      var status = mystyle.getAttribute("status");
      //console.log(status);
      var tileInd = mystyle.getAttribute("tileInd");
      //console.log(tileInd);
      if(status== "true") {
        mystyle.style.border = "5px solid black";
        mystyle.setAttribute("status", "false");
      } else {
        mystyle.style.border = "5px solid red";
        mystyle.setAttribute("status", "true");
      }
    }

    // queue construction
    function Queue() {
      this.elements = [];
    }

    // enqueue
    Queue.prototype.enqueue = function (e) {
      this.elements.push(e);
    };

    // remove an element from the front of the queue
    Queue.prototype.dequeue = function() {
      this.elements.shift();
    }

    // get the element at the front of the queue
    Queue.prototype.peek = function () {
      return !this.isEmpty() ? this.elements[0] : undefined;
    };

    // check if the queue is empty
    Queue.prototype.isEmpty = function () {
      return this.elements.length == 0;
    };

    Queue.prototype.size = function() {
      return this.elements.length;
    }

    var q = new Queue();
    var jigsawInd = setLoadJigsawind();

    // swap jigsaw ind
    Queue.prototype.swap = function() {
      var drawStatus = 0;
      var gameStatus = 0;
      var size = q.size()
      if(size == "2") {
        var first = q.peek();
        q.dequeue();
        //console.log("first: " + first);
        var firstSelectedTile = document.getElementById(first);
        //console.log("firstSelectedTile: " + firstSelectedTile);

        var second = q.peek();
        q.dequeue();
        var secondSelectedTile = document.getElementById(second);
        //console.log("secondSelectedTile: " + secondSelectedTile);

        var firstTileJigsawInd = firstSelectedTile.getAttribute("jigsawInd")
        //console.log("firstTileJigsawInd: " + firstTileJigsawInd);
        var secondTileJigsawInd = secondSelectedTile.getAttribute("jigsawInd")
        //console.log("secondTileJigsawInd: " + secondTileJigsawInd);
        var tempInd = firstTileJigsawInd;
        firstTileJigsawInd = secondTileJigsawInd;
        secondTileJigsawInd = tempInd;

        // update jigsaw index
        jigsawInd[firstSelectedTile.getAttribute("ind")] = firstTileJigsawInd;
        //console.log("firstSelectedTileAfter: "+ jigsawInd[firstSelectedTile.getAttribute("ind")]);
        jigsawInd[secondSelectedTile.getAttribute("ind")] = secondTileJigsawInd;
        //console.log("secondSelectedTileAfter: "+ jigsawInd[secondSelectedTile.getAttribute("ind")]);

        firstSelectedTile.setAttribute("status", false);
        firstSelectedTile.style.border = "5px solid black";
        secondSelectedTile.setAttribute("status", false);
        secondSelectedTile.style.border = "5px solid black";
        console.log("CurrentJigsawInd: " + jigsawInd);

        window.onload();
        setJigsawIndToServer();
        console.log("swap: " );
        drawStatus = 1;

        gameStatus = win();
        console.log("gameStatus: " + gameStatus);
      }

      if(gameStatus == 1) {
        alert("WIN!!!!");
        gameStatus = 2;
      }
      if(gameStatus == 2) {
        //setJigsawInd();
        console.log("gamestatus = 2");
        rndJigsawAfterWin()
        window.location.reload();
      }
    }

    function win() {
      var gameStatus = 0;
      if((jigsawInd[0] == 0) && (jigsawInd[1] == 1) && (jigsawInd[2] == 2) && (jigsawInd[3] == 3) && (jigsawInd[4] == 4) &&
      (jigsawInd[5] == 5) && (jigsawInd[6] == 6) && (jigsawInd[7] == 7) && (jigsawInd[8] == 8)) {
        gameStatus = 1;
      }
      return gameStatus;
    }

    function setJigsawIndToServer() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML = this.responseText;
        }
      };
      console.log("jigsawInd: " + jigsawInd);
      xhttp.open("POST", "src/models/setJigsawIndToServer.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("data="+jigsawInd);
    }

    function rndJigsawAfterWin() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML = this.responseText;
        }
      };
      xhttp.open("POST", "src/models/rndJigsawAfterWin.php", true);
      xhttp.send();
    }

    // use for the first load picture
    window.onload = function() {
      const image = document.getElementById("output");
      var canvas = [9];
      var jigsaw = [9];
      var canvasID = [9];
      for(var i = 0; i < 9; i++) {
        //console.log("jigsaw" + jigsawInd[i]);
        var rowTile = Math.floor(jigsawInd[i]/3);
        //console.log("rowTile: " + rowTile);
        var columnTile = jigsawInd[i]%3;
        //console.log("columnTile: " + columnTile);
        var rowCanvas= Math.floor(i/3);
        //console.log(rowCanvas);
        var columnCanvas = i%3;
        //console.log(columnCanvas);
        canvasID[i] = "tile" + i;
        //console.log(canvasID[i]);
        canvas[i] = document.getElementById(canvasID[i]);
        //console.log(canvas[i]);
        canvas[i].setAttribute("jigsawInd", jigsawInd[i]);
        jigsaw[i] = canvas[i].getContext('2d');
        //void ctx.drawImage(image, sx, sy, sWidth, sHeight, dx, dy, dWidth, dHeight);
        jigsaw[i].drawImage(image, columnTile * 120, rowTile * 120, 120, 120, 0, 0, 120 ,120);
      }
      console.log("onload");
    };
    </script>
    <?php
  }
}
