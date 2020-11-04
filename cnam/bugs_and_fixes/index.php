<?php 
$dir_fixes = "videos/fixes";
$dir_errors = "videos/errors";

$fix_files = scandir($dir_fixes);
$error_files = scandir($dir_errors);

$fix_files_names_arr = array();
$error_files_names_arr = array();
$fix_files_arr = array();
$error_files_arr = array();

if(sizeof($fix_files)){
  foreach($fix_files as $file){
    //echo $file;
    $filename = explode(".", $file)[0];
    if(strlen($filename)){
      $fix_files_names_arr[] = $filename;
      $fix_files_arr[] = $file;
    }
    
  }
}

if(sizeof($error_files)){
  foreach($error_files as $file){
    //echo $file;
    $filename = explode(".", $file)[0];
    if(strlen($filename)){
      $error_files_names_arr[] = $filename;
      $error_files_arr[] = $file;
    }
  }
}

/*print_r($fix_files_names_arr);
print_r($error_files_names_arr);

exit();*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Bugs and fixes</title>
<link rel="stylesheet" href="./styles/choices.min.css">
<link rel="shortcut icon" href="images/vneuron_logo.png" type="image/png">
<link rel="stylesheet" href="./styles/video-js.min.css">

<style>



body{
  margin:0px;
}

.header{
  height:70px;
  box-shadow:0 0 3px 1px grey;
  width: 100vw;
  position: fixed;
  top:0px;
  left:0px;
  display: flex;
  justify-content: space-between;
  background-color: #FFF;
  height: 54px;
  padding: 3px;
  z-index: 9999;
}

.content{
  margin-top: 60px;
  padding:3px;
  height:calc(100vh - 66px);
}

.videos-select-parent{
  height: 100%;
  min-width: 300px;
}

.header .logo{
  height:100%;
}


.choices__inner{
  min-height: auto;
  height: 100%;
  padding: 0px !important;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: inset 0 0 0px 1px #cac9c9;
}

.choices{
  height: 100%;
}

.video-js-container, .video-js-parent{
 height:100%;
 width:100%;
}

.my-player{
 width:100%;
 max-height: 600px;
}

.video-js .vjs-poster{
background-color: rgba(0, 0, 0, 0.4);
}

.video-js .vjs-big-play-button{
 left: 50%;
 top: 50%;
 transform: translate(-50%,-50%);
}

.video-container{
  display:flex;
  width: 100%;
  flex-direction: column;
}

.video-container > hr{
  width:100%;
  border:1px solid grey;
  margin-top:8px;
  margin-bottom:8px;
}

.video-container > div{
  display: flex;
  flex-direction: column;
}

.video-section{
  height:100%;
}

.error-video-parent{
  margin-bottom:8px;
}

.video-title{
  text-align: center;
  margin-bottom: 8px;
  margin-top: 10px;
}

.video-section{
  display:none;
}

.video-section-selected{
  display:block;
}

</style>
</head>

<body>
<header class="header">
  <div class="videos-select-parent">
  <select class="videos-select" style="height:100%;min-width:302px;">
    <option value="" selected>--Select example--</option>
    <?php 
    foreach($fix_files_names_arr as $fix_file_name){
    ?>
    <option value="<?php echo $fix_file_name; ?>"><?php echo "Example ".$fix_file_name; ?></option>
    <?php
    }
    ?>
  </select>
  </div>
  <img src="./images/spark-150.png" class="logo">
</header>

<div class="content">

<?php 
$ind = 0;
foreach($fix_files_names_arr as $fix_file_name){
?>

<div class="video-section" data-video-number="<?php echo $fix_file_name; ?>">


<div class="video-container">

<div class="error-video-parent">
<h2 class="video-title">Old implementation</h2>
<video
    class="video-js my-player"
    controls
    preload="auto"
    data-setup="{}"
  >
    <source src="<?php echo 'videos/errors/'.$error_files_arr[$ind]; ?>" type="video/webm" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>
</div>
<hr>
<div class="fix-video-parent">
<h2 class="video-title">New implementation</h2>
<video
    class="video-js my-player"
    controls
    preload="auto"
    data-setup="{}"
  >
    <source src="<?php echo 'videos/fixes/'.$fix_files_arr[$ind]; ?>" type="video/webm" />
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

</div>
<?php
$ind++;
}
?>
</div>
<script src="./scripts/video.min.js"></script>

<script src="./scripts/choices.min.js"></script>
<script>
  window.addEventListener("load", function(){
    let selectElement = document.querySelector("select.videos-select");
    const choicesSelect = new Choices(selectElement);
    choicesSelect.passedElement.element.addEventListener("choice", function(event){
      console.log("choices choice event: ", event);
      let selectValue = event.detail.choice.value;
      let selectedVideoSectionElement = document.querySelector(".video-section-selected");
      if(selectedVideoSectionElement){
        selectedVideoSectionElement.classList.remove("video-section-selected");
      }
      let newSelectedVideoSectionElement = document.querySelector(".video-section[data-video-number='"+selectValue+"']");
      newSelectedVideoSectionElement.classList.add("video-section-selected");
    });
    choicesSelect.setChoiceByValue("");
  });
</script>
</body>
</html>
