<?php

    require('../../wp-blog-header.php');
    $arrUser = array();
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user(); 
        
        if ($current_user->ID == 1){
            $asoUser = array("wp_userid"=>$current_user->ID, "wp_nickname"=>$current_user->display_name, "wp_logged_in"=>true, "message"=>"Eingeloggt", "admin"=>true);
        } else {
            $asoUser = array("wp_userid"=>$current_user->ID, "wp_nickname"=>$current_user->display_name, "wp_logged_in"=>true, "message"=>"Eingeloggt", "admin"=>false);
        }
        array_push($arrUser,$asoUser); 

    } else {
        $asoUser = array("wp_userid"=>$current_user->ID, "wp_nickname"=>$current_user->display_name, "wp_logged_in"=>false, "message"=>"Bitte einloggen!", "admin"=>false);
        array_push($arrUser,$asoUser); 
    }
    
        $json = json_encode($arrUser);

        echo $json;

?>