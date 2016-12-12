<?php

namespace JenkinsJobs;

class Database{

    private $db_name = "jobs.db";
    function __construct(){

    }

    function insertJob($job, $status, $checkTime){
        $qry = "INSERT INTO jobs (name, status, time_checked) VALUES ('" . $job . "', '" . $status . "', '" . $checkTime . "')";
        $db = new \SQLite3($this->db_name);
        $db->exec($qry);
    }
    function initDb(){
        $db = new \SQLite3($this->db_name);

        try{
            $qry =  "CREATE TABLE IF NOT EXISTS jobs ( id integer primary key , name text, status text, time_checked date)";
            // If this is run after
            $db->query($qry);
        }
        catch(\Exception $ex){

        }
    }


}


?>