<?php
function print_help() {
    echo "Usage: internsctl [options]\n";
    echo "Options:\n";
    echo "--help      Display help information\n";
    echo "--version   Display version information\n";
}

function print_version() {
    echo "internsctl version 1.0\n";
}

if ($argc > 1) {
    if ($argv[1] == "--help") {
        print_help();
    } elseif ($argv[1] == "--version") {
        print_version();
    } else {
        echo "Unknown option. Use --help for usage information.\n";
    }
} else {
    echo "No options provided. Use --help for usage information.\n";
}
