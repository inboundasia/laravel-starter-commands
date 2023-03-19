<?php

require __DIR__ . '/vendor/autoload.php';

function ask(string $question, string $default = ''): string
{
    $answer = readline($question.($default ? " ({$default})" : null).': ');

    if (! $answer) {
        return $default;
    }

    return $answer;
}

// preversion 
shell_exec("git pull --tags");

$composer = json_decode(file_get_contents('composer.json'), true);
$version = new \PHLAK\SemVer\Version($composer['version']);

$type = ask('major/minor/patch?', 'patch');

if ($type === 'patch') {
    $version->incrementPatch();
} else if ($type === 'minor') {
    $version->incrementMinor();
} else if ($type === 'major') {
    $version->incrementMajor();
}

$composer['version'] = (string) $version;
file_put_contents('composer.json', json_encode($composer, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

shell_exec("git add .");
shell_exec("git commit -m 'change version to $version'");
shell_exec("git tag $version");
shell_exec("git push --tags");
