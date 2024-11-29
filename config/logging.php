<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    'channels' => [
        'stackdriver' => [
            'driver' => 'custom',
            'via' => Firevel\Stackdriver\CreateStackdriverLogger::class,
            'level' => 'debug',
        ],
    ],

];
