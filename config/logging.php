<?php

return [

    'channels' => [
        'stackdriver' => [
            'driver' => 'custom',
            'via' => Firevel\Stackdriver\CreateStackdriverLogger::class,
            'level' => 'debug',
        ],
    ],

];
