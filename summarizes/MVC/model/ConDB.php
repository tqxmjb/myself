<?php
class ConDB
{
    function getConnection()
    {
       $con = @mysql_connect("127.0.0.1", "root", "root") or die("the DB is error!");
       return $con;
    }
    function closeCon($con)
    {
        if($con!=null)
        {
            mysql_close($con);
        }
    }
}
(new ConDB())->getConnection();