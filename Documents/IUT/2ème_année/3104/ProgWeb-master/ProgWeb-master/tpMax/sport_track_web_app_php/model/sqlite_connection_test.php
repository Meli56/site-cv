<?php 

ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    require_once('SqliteConnection.php');
    require_once('Users.php');
    require_once('UsersDAO.php');

    require_once('ActivityDAO.php');
    require_once('Activity.php');

    require_once('ActivityEntry.php');
    require_once('ActivityEntryDAO.php');



    $user = new Users();
    $user->init("Snowden1", "Edward", "01/01/1980", 1, 180, 75, "edward.snowden@nsa.gov.16", "admin"); 

    $userDao = UsersDAO::getInstance();
    $userDao->insert($user);
    
    $userS = $userDao->findAll();
    echo print_r($userS, 1);

    $user_updt = new Users();
    $user_updt->init("Snowden", "Patrick", "01/01/1980", 1, 180, 75, "edward.snowden@nsa.gov.16", "admin");
    $userDao->update($user_updt);

    $userS = $userDao->findAll();
    echo print_r($userS, 1);

    $oneUser = $userDao->find("edward.snowden@nsa.gov.16");
    echo print_r($oneUser, 1);

    $userDao->delete($user);

    $userS = $userDao->findAll();
    echo print_r($userS, 1); 
    //-------------------------------------

    /* //TEST DE ActivityDAO

    $act = new Activity();
    $act->init(9, "13/09/2029", "lol", 07);

    $actDao = ActivityDAO::getInstance();
    $actDao->insert($act); 

    $acts = $actDao->findAll();
    echo print_r($acts, 1);   */

    //-------------------------------------------

    //TEST DE ActivityEntryDAO
/*
    $actEnt = new ActivityEntry();
    $actEnt->init(13, "10:12", 195, 55, 6, 7, 32);

    $actEntDAO = ActivityEntryDAO::getInstance();
    $actEntDAO->insert($actEnt);

    $actEntS = $actEntDAO->findAll();
    echo print_r($actEntS, 1);

    $actEnt_updt = new ActivityEntry();
    $actEnt_updt->init(13, "10:12", 666, 666, 666, 666, 666);
    $actEntDAO->update($actEnt_updt);

    $actEntS = $actEntDAO->findAll();
    echo print_r($actEntS, 1);
    
    $actEntDAO->delete($actEnt);

    $actEntS = $actEntDAO->findAll();
    echo print_r($actEntS, 1); 
*/
?>