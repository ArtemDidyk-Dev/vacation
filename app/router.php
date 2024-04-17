<?php

declare(strict_types=1);

use App\Containers;
use Framework\Route;

$containers = new Containers();
Route::set('/', [
    'controller' => $containers->containers['MainController'],
    'method' => 'index',
], 'GET');
