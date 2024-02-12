<?php

function create_user($username) {
    // Add a new user with home directory and login shell
    $output = shell_exec("sudo useradd -m -s /bin/bash $username");
    return $output;
}

function list_users($sudo_only = false) {
    if ($sudo_only) {
        $output = shell_exec("sudo getent group sudo");
        $users = explode(":", $output)[3];
        $sudo_users = explode(",", $users);
        echo "Users with sudo permissions:\n";
        foreach ($sudo_users as $user) {
            echo trim($user) . "\n";
        }
    } else {
        $output = shell_exec("getent passwd");
        $users = explode("\n", $output);
        echo "Regular users:\n";
        foreach ($users as $user) {
            $username = explode(":", $user)[0];
            echo $username . "\n";
        }
    }
}

if ($argc < 2) {
    echo "Usage: php internsctl.php [create <username>|list [--sudo-only]]\n";
    exit(1);
}

$command = $argv[1];

if ($command === 'create') {
    if ($argc < 3) {
        echo "Usage: php internsctl.php create <username>\n";
        exit(1);
    }
    $username = $argv[2];
    echo create_user($username);
} elseif ($command === 'list') {
    $sudo_only = isset($argv[2]) && $argv[2] === '--sudo-only';
    list_users($sudo_only);
} else {
    echo "Invalid command. Please specify 'create' or 'list'.\n";
    exit(1);
}

?>
