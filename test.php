<?php

$path = __DIR__ . '/../log/';
chmod($path, 0755);
file_put_contents($path . 'testlog.log', 'New log from script in ' . date('r'), FILE_APPEND);