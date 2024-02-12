# Linux_custom_script_task
internsctl Command Manual

Description:
The internsctl command is a tool for managing intern tasks.

Usage:
internsctl [options]

Options:
--help      Display help information
--version   Display version information



# internsctl - Server Management Tool
#first we have created a internsctl.php and solve the section A
#After that we solve the another section and the section name is the file name 

## Description
`internsctl` is a command-line tool for managing users and retrieving file information on a Linux server.

## Features
- Create and list users on the server
- Retrieve information about a file, such as size, permissions, owner, and last modified time

## Usage

### For User Management (internsctl.php)
- **Create a new user**:  


- **List all regular users**:  


- **List users with sudo permissions**:  




### For File Information Retrieval (internsctl_file.php)
- **Get information about a file**:  



Options:
- `--size`, `-s`: Print file size
- `--permissions`, `-p`: Print file permissions
- `--owner`, `-o`: Print file owner
- `--last-modified`, `-m`: Print last modified time

## Examples
- **Create a new user**:  


- **List all regular users**:  


- **List users with sudo permissions**:  


