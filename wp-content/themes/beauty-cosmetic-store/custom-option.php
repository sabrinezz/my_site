<?php

    $beauty_cosmetic_store_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $beauty_cosmetic_store_scroll_position = get_theme_mod( 'beauty_cosmetic_store_scroll_top_position','Right');
    if($beauty_cosmetic_store_scroll_position == 'Right'){
        $beauty_cosmetic_store_theme_css .='#button{';
            $beauty_cosmetic_store_theme_css .='right: 20px;';
        $beauty_cosmetic_store_theme_css .='}';
    }else if($beauty_cosmetic_store_scroll_position == 'Left'){
        $beauty_cosmetic_store_theme_css .='#button{';
            $beauty_cosmetic_store_theme_css .='left: 20px;';
        $beauty_cosmetic_store_theme_css .='}';
    }else if($beauty_cosmetic_store_scroll_position == 'Center'){
        $beauty_cosmetic_store_theme_css .='#button{';
            $beauty_cosmetic_store_theme_css .='right: 50%;left: 50%;';
        $beauty_cosmetic_store_theme_css .='}';
    }