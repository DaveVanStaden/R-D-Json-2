<?php
$file = "school.json";
if (file_exists($file)){
  $filedata = file_get_contents($file);
  $objson = json_decode($filedata, true);
}else echo $file .' not exist';

function writeJson($objson, $fileOutput){
    $saveJson = json_encode($objson);
    $file = fopen($fileOutput, "w") or die ("can't open file");
    fwrite($file, $saveJson);
    fclose($file);
}

$school_1_category = $_POST["school_1_category"];
$school_1_students = $_POST["students"];
$school_1_courses_GD = $_POST["students"];
$school_1_courses_MD = $_POST["students"];
$school_1_classes_GD_1 = $_POST["students"];

$objson["school"]["Mediacollege"]["Niveau"] = $school_1_category;
$objson["school"]["Nova"]["nr_students"] = $school_1_students;
$objson["school"]["Nova"]["courses"]["GD"] = $school_1_courses_GD;
$objson["school"]["Nova"]["courses"]["GD"]["classes"] = $school_1_classes_GD_1;
$objson["school"]["Nova"]["courses"]["MD"] = $school_1_courses_MD;
writeJson($objson,"school.json");
echo $file;

echo "<hr><code><hr>";
print_r($objson);
echo "</pre></code><hr>";

?>
