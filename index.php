<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/framework/env.php';
envParser(__DIR__ . '/.env');
require __DIR__ . '/app/router.php';
