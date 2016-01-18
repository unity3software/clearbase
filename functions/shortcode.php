<?php

add_shortcode('clearbase', 'clearbase_short_code_handler');

function clearbase_short_code_handler($atts) {
    if (empty($atts['id']))
        die('shortcode: clearbase must supply a valid gallery id!');

    ob_start();
    $controller = clearbase_get_controller((int)$atts['id']);
    $controller->ShortCode($atts);
    $controller->Enqueue();
    $controller->PreRender();
    $controller->Render();
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}