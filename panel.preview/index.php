<?php

Route::set('-preview/' . Guardian::token(), function() {
    if (!Request::is('post')) {
        echo '<p>' . To::sentence($language->error) . '</p>';
        exit;
    }
    HTTP::status(200);
    $__q = Request::get('path', "");
    $__path = LOT . DS . $__q;
    $__path = File::exist([
        $__path . '.draft',
        $__path . '.page',
        $__path . '.archive'
    ], null);
    $__NS = substr($__q, 0, strpos($__q . '/', '/'));
    $__any = new Page(null, [], $__NS);
    $__NS .= '.';
    $__type = Hook::fire($__NS . 'type', [Request::post('type', 'HTML'), [
        'path' => $__path
    ], $__any, 'type']);
    $__title = Hook::fire($__NS . 'title', [Request::post('title', null), [
        'path' => $__path,
        'type' => $__type
    ], $__any, 'title']);
    $__content = Hook::fire($__NS . 'content', [Request::post('content', null), [
        'path' => $__path,
        'type' => $__type
    ], $__any, 'content']);
    echo $__title ? '<h3>' . $__title . '</h3>' : "";
    echo $__content ? '<div class="p">' . $__content . '</div>' : "";
    exit;
});