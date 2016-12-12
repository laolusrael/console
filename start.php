<?php 

require "./vendor/autoload.php";
require "config.php";


if(!isset($config["instance"])){
    die("\r\n\t Jenkins instance is required, please set it in the config.php file");
}

try{

    $jenkins = new JenkinsApi\Jenkins($config["instance"]);
 
    $jobsDb =  new \JenkinsJobs\Database();

    $jobsDb->initDb();

    $count = 1;

    echo "\r\n Getting jobs on instance ( " . $config["instance"] . " ) ... \r\n";

       

    foreach($jenkins->getJobs() as $job){
        echo "\r\n". $count  .  ". " . $job->getName() . " | " . $job->getColor() . " | " . (new DateTime())->format("d-m-Y h:i:s");
        $count++;
        $jobsDb->insertJob($job->getName(), $job->getColor(), (new DateTime())->format("d-m-Y h:i:s"));
    }


}
catch(Exception $e){
    echo "\r\nAn Error Has Occured: \r\n";

    echo $e->getMessage();
}

?>