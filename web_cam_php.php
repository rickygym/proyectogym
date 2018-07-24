<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>

#c{ display:none;}
</style>
</head>

<body>
<img src="" id='img' />
<video id='v'></video>
<canvas id='c'></canvas>
<button id='t'>toma cam </button>
<script type="text/javascript">
  window.addEventListener('load',init);
  function init(k){
    var video = document.querySelector('#v'), canvas = document.querySelector('#c'), btn = document.querySelector('#t'), img = document.querySelector('#img');

    navigator.getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUSerMedia || navigator.msGetUserMedia);

    if(navigator.getUserMedia){
      navigator.getUserMedia({video:true},function(stream){
        video.src = window.URL.createObjectURL(stream);
        video.play();
      },function(e){console.log(e)});

      video.addEventListener('loadedmetadata',function(){canvas.width = video.videoWidth, canvas.height = video.videoHeight;},false);
      btn.addEventListener('click',function(){
        canvas.getContext('2d').drawImage(video,0,0);
        var imgData = canvas.toDataURL('image/png');
        img.setAttribute('src',imgData);

      });

    }else{
      alert("Actualiza tu nvegador");

    }

  }
</script>﻿
</body>
</html>


