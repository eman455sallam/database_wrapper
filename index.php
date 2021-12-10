<?php


//test

require "db.php";

$db=new db("localhost" ,"root","" ,"lms");
$res=$db->select("instructor","id,name")->where("id","=",2)->getRow();

echo"<pre>";
print_r($res);






?>