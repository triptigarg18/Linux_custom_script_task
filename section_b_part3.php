<?php

function get_file_info($file_path, $options) {
    $info = array();
    $info['File'] = $file_path;

    if (in_array('size', $options)) {
        $info['Size(B)'] = filesize($file_path);
    }
    if (in_array('permissions', $options)) {
        $permissions = substr(sprintf('%o', fileperms($file_path)), -4);
        $info['Access'] = $permissions;
    }
    if (in_array('owner', $options)) {
        $info['Owner'] = fileowner($file_path);
    }
    if (in_array('last-modified', $options)) {
        $modified_time = filemtime($file_path);
        $info['Modify'] = date('Y-m-d H:i:s', $modified_time);
    }

    return $info;
}

if ($argc < 2) {
    echo "Usage: php internsctl_file.php [options] <file-name>\n";
    exit(1);
}

$options = array();
$file_path = $argv[count($argv) - 1];

for ($i = 1; $i < $argc - 1; $i++) {
    if ($argv[$i] === '--size' || $argv[$i] === '-s') {
        $options[] = 'size';
    } elseif ($argv[$i] === '--permissions' || $argv[$i] === '-p') {
        $options[] = 'permissions';
    } elseif ($argv[$i] === '--owner' || $argv[$i] === '-o') {
        $options[] = 'owner';
    } elseif ($argv[$i] === '--last-modified' || $argv[$i] === '-m') {
        $options[] = 'last-modified';
    }
}

$file_info = get_file_info($file_path, $options);
foreach ($file_info as $key => $value) {
    echo "$key: $value\n";
}

?>
