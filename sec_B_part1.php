<?php

function get_cpu_info() {
    $output = shell_exec('wmic cpu get /format:list');
    return $output;
}

function get_memory_info() {
    $output = shell_exec('systeminfo');
    return $output;
}

if ($argc < 2) {
    echo "Usage: php internsctl.php [cpu|memory]\n";
    exit(1);
}

$resource = $argv[1];

if ($resource === 'cpu') {
    echo get_cpu_info();
} elseif ($resource === 'memory') {
    echo get_memory_info();
} else {
    echo "Invalid resource specified. Please specify 'cpu' or 'memory'.\n";
    exit(1);
}

?>
