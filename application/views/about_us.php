<!DOCTYPE html>
<html>
<head>
	<title>About US Page</title>
</head>
<body>

    <?php

       $array = explode('|',$about[0]['images']);
       echo '<strong>Title:</strong>' .$about[0]['title'].'<br>';
       echo '<strong>Content:</strong>'.$about[0]['content'].'<br>';

       echo '<strong>Images:</strong>';
       foreach($array as $arr)
       {
           echo $arr.'<br>';
       }
  


    ?>

</body>
</html>
