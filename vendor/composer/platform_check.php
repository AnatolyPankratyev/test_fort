<?php

// platform_check.php @generated by Composer

$issues = array();

if (!(PHP_VERSION_ID >= 50304)) {
    $issues[] = 'Your Composer dependencies require a PHP version ">= 5.3.4". You are running ' . PHP_VERSION  .  '.';
}

if ($issues) {
    echo 'Composer detected issues in your platform:' . "\n\n" . implode("\n", $issues);
    exit(104);
}
