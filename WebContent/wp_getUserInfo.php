<?php

    require('../../wp-blog-header.php');
    $arrUser = array();
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        
        $asoUser = array("wp_userid"=>$current_user->ID, "wp_nickname"=>$current_user->display_name, "wp_logged_in"=>true, "message"=>"Eingeloggt");
        array_push($arrUser,$asoUser); 

    } else {
        $asoUser = array("wp_userid"=>$current_user->ID, "wp_nickname"=>$current_user->display_name, "wp_logged_in"=>false, "message"=>"Bitte einloggen!");
        array_push($arrUser,$asoUser); 
    }
    
        $json = json_encode($arrUser);

        echo $json;

?>