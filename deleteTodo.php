<?php
  $target;
  $title = $_GET['title'];
  echo("Received item to delete ".$title."\n");
  //open and load JSON file
  $jsonString = file_get_contents('todo.json');
  $data = json_decode($jsonString,true);
  for($i=0;$i<$data.length;$i++){
    if($data['title']==$title) {
      for($i;$i<$data.length-1;$i++){
        $data[$i]['title']=$data[$i+1]['title'];
      }
    } else {
      echo("Did not find item \n");
    }
  }
  $newJsonString = json_encode($data);
  echo("New JSON file: ".$newJsonString."\n");
  file_put_contents('todo.json', $newJsonString);
?>