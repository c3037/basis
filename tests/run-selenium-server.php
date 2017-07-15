<?php

// base directory
$baseDir = dirname(__FILE__) . '\\selenium-server\\';
if (!file_exists($baseDir)) {
    mkdir($baseDir, 0777, true);
}

// selenium server
$seleniumURL  = 'https://selenium-release.storage.googleapis.com/3.4/selenium-server-standalone-3.4.0.jar';
$seleniumFile = basename($seleniumURL);
if (!file_exists($baseDir . $seleniumFile)) {
    echo "Download {$seleniumFile}...\n";
    file_put_contents($baseDir . $seleniumFile, fopen($seleniumURL, 'r'));
    echo "Done...\n";
}

// chrome driver
$chromeDriverURL  = 'http://chromedriver.storage.googleapis.com/2.30/chromedriver_win32.zip';
$chromeDriverFile = basename($chromeDriverURL);
if (!file_exists($baseDir . 'chromedriver.exe')) {
    echo "Download {$chromeDriverFile}...\n";
    file_put_contents($baseDir . $chromeDriverFile, fopen($chromeDriverURL, 'r'));

    echo "Unzip {$chromeDriverFile}...\n";
    $zip = new ZipArchive;
    $zip->open($baseDir . $chromeDriverFile);
    $zip->extractTo($baseDir);
    $zip->close();

    unlink($baseDir . $chromeDriverFile);
    echo "Done...\n";
}

// firefox driver
$firefoxDriverURL  = 'https://github.com/mozilla/geckodriver/releases/download/v0.18.0/geckodriver-v0.18.0-win32.zip';
$firefoxDriverFile = basename($firefoxDriverURL);
if (!file_exists($baseDir . 'geckodriver.exe')) {
    echo "Download {$firefoxDriverFile}...\n";
    file_put_contents($baseDir . $firefoxDriverFile, fopen($firefoxDriverURL, 'r'));

    echo "Unzip {$firefoxDriverFile}...\n";
    $zip = new ZipArchive;
    $zip->open($baseDir . $firefoxDriverFile);
    $zip->extractTo($baseDir);
    $zip->close();

    unlink($baseDir . $firefoxDriverFile);
    echo "Done...\n";
}

// run
echo "Run server...\n";
$command = "java"
    . " -Dwebdriver.chrome.driver=\"{$baseDir}chromedriver.exe\""
    . " -Dwebdriver.gecko.driver=\"{$baseDir}geckodriver.exe\""
    . " -jar \"{$baseDir}{$seleniumFile}\"";
exec($command);
echo "Done...\n";
