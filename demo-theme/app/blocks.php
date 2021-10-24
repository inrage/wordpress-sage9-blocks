<?php

namespace App;

$blocks = collect(glob(__DIR__ . '/Blocks' . '/*.php'))
    ->map(function ($file_name) {
        return str_replace('.php', '', basename($file_name));
    })->reject(function ($class_name) {
        return $class_name === 'AbstractBlock';
    })->map(function ($class_name) {
        $full_class_name = "\\App\\Blocks\\{$class_name}";
        $class = new $full_class_name;
        return 'acf/'.$class->name;
    })->values()->toArray();
