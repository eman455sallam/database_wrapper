<?php


class db{
   public $connection;
   public $sql;

   public function __construct($server ,$user ,$pass ,$dbName)
   {
       $this->connection=mysqli_connect($server ,$user ,$pass ,$dbName);
   }

   public function query($sql)
   {
    return mysqli_query($this->connection ,$sql);

   }

   public function select($table ,$column)
   {
      $this->sql="SELECT $column FROM `$table`";
      return $this;
   }

   public function where ($column ,$compair ,$value)
   {
       $this->sql .="WHERE `$column` $compair $value";
       return $this;
   }


   public function getAll()
   {
    $query_result=$this->query($this->sql);
    while($row=mysqli_fetch_assoc($query_result))
    {
       $data[]=$row;
    }
    return $data;
    
   }


   public function getRow()
   {
       echo $this->sql;die;
    $query_result=$this->query($this->sql);
    $row=mysqli_fetch_assoc($query_result);
    
    return $row;
    
   }
   

   public function insert($table , $data)
   {
       $columns="";
       $values="";

        foreach($data as $column => $value){
           
            $columns .="`$column` ," ;
            $values .="`$value` , ";
        }

        $columns=rtrim("`$column` ,");
        $values=rtrim("`$value` , ");


       $this->sql ="INSERT INTO `$table` () VALUES ()";
      // echo $this->sql ;
      return $this ;
   }

   public function update($table ,$data)
   {
       $statment="";
       foreach($data as $column => $value)
       {
           $statment .=" `$column`=`$value ` ,";
       }
       $statment=rtrim($statment ,",");
       $this->sql="UPDATE `$table` SET ";
       return $this;
   }
   public function join($table ,$type)
   {
    $this->sql="$type JOIN $table";
    return $this;
   }
     
   public function delete($table)
   {
        $this->sql="DELETE TABLE `$table`";
        return $this ;
   }

   public function excute( )
       {
        $this->query($this->sql);
      return mysqli_affected_rows($this->connection); 
       }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }
  

}













?>