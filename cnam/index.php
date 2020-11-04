<!DOCTYPE html>
<html>
<head>
<link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
<title>Vneuron demos</title>
<style>
body{
 margin:0px;
 width:100vw;
 height:100vh;
}

.video-js-container, .video-js-parent{
 height:100%;
 width:100%;
}

#my-player{
 min-width:100%;
 min-height:100%;
}

.video-js .vjs-big-play-button{
 left: 50%;
 top: 50%;
 transform: translate(-50%,-50%);
}

.ring-parent{
background-color: #000000;
position: absolute;
z-index: 1;
width: 100%;
height: 100%;
}

.lds-ring {
width: 160px;
height: 160px;
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%,-50%);
}
.lds-ring div {
  box-sizing: border-box;
display: block;
position: absolute;
width: 128px;
height: 128px;
margin: 16px;
border: 8px solid #fff;
    border-top-color: rgb(255, 255, 255);
    border-right-color: rgb(255, 255, 255);
    border-bottom-color: rgb(255, 255, 255);
    border-left-color: rgb(255, 255, 255);
border-radius: 50%;
animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    animation-delay: 0s;
border-color: #fff transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
<link rel="shortcut icon" href="images/vneuron_logo.png" type="image/png">
</head>
<body>
<div class="video-js-container" style="position:relative">
  <div class="ring-parent">
  <div class="lds-ring">
   <div></div>
   <div></div>
   <div></div>
   <div></div>
  </div>

 </div>

<div class="video-js-parent" style="display:none;">
  <video
    id="my-player"
    class="video-js"
    controls
    preload="auto"
    poster="MY_VIDEO_POSTER.jpg"
    data-setup="{}"
  >
    <source src="videos/latest.webm" type="video/webm" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>

</div>

</div>

  <script src="https://vjs.zencdn.net/7.8.4/video.js"></script>

<script>
videojs.hook("setup", function(player){
	console.log("player created!");
	console.log("player = ", player);
	player.el().parentElement.style.display = "";
	document.querySelector(".ring-parent").style.display = "none";
});

var player = videojs("my-player",{
 width:"100%",
 height:"100%"
});
</script>
</body>
</html>
