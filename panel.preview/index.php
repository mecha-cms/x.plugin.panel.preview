<?php

Route::set('-preview/' . Guardian::token(), function() {
    if (!Request::is('post')) {
        echo '<p>' . To::sentence($language->error) . '</p>';
        exit;
    }
    HTTP::status(200);
    $__q = Request::get('path', "", false);
    $__NS = substr($__q, 0, strpos($__q . '/', '/'));
    $__request = Request::post(null, []);
    // $__request['path'] = LOT . DS . $__q . '.' . Request::post('x', 'page');
    $__any = new Page(null, $__request, ['*', $__NS]);
    foreach ($__request as $__k => $__v) {
        $__any->{$__k} = $__v;
    }
    echo $__any->title ? '<h3>' . $__any->title . '</h3>' : "";
    echo $__any->content ? '<div class="p">' . $__any->content . '</div>' : "";
    exit;
});