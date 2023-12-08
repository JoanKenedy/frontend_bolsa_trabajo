<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>&nbsp;
            <li>/</li>
            &nbsp;<li>Mi cuenta</li>
        </ul>
    </div>

</div>
<?php

if(isset($urlParams[1])){
  include $urlParams[1]."/".$urlParams[1].".php";
}else{
   echo '<script> window.location= "'.$path.'" </script>';
}
?>