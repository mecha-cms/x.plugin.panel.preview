<?php

Hook::set('shield.enter', function() use($language, $site, $url, $__path, $__state) {
    if ($site->is === 'page' && Request::get('view', Config::get('panel.view')) === 'page' && strpos($__path . '/', '/+/') === false) {
        Asset::set(__DIR__ . DS . 'lot' . DS . 'asset' . DS . 'css' . DS . 'panel.preview.min.css', 20);
        Asset::set(__DIR__ . DS . 'lot' . DS . 'asset' . DS . 'js' . DS . 'panel.preview.min.js', 20);
        Config::set('panel.m.t.preview', [
            'content' => '<div id="panel-preview">' . $language->loading . '&#x2026;</div>',
            'attributes' => [
                0 => [
                    'data' => [
                        'url' => $url . '/-preview/' . Guardian::token() . '?path=' . urlencode($__path)
                    ]
                ]
            ],
            'stack' => 100
        ]);
    }
}, 0);