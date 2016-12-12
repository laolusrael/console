

JenkinsJob is a command line php application that connects to a given Jenkins instance and lists the jobs on that instance,
It then proceeds to save the jobs in a sqlite database along the time the check was made.


The database file is ./jobs.db

The application uses composer to load dependencies (App is dependent on chbiel/jenkins-php-ap  Jenkins Api Lib).

./start.php file contains the application routine.
This file calls the Jenkins api, as well as Database class which handles creation of the db and insertion of records to the database file. 
It is found in ./src/JenkinsJob/Database.php

The ./config.php file contains the address of the jenkins instance to connect to.
Ensure this is properly set before running the script.

To run the script, type the following at the command prompt from the root of the application folder;

$ php start.php