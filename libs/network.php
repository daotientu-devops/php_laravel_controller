<?php
/**
 * Created by PhpStorm.
 * User: daotientu
 * Date: 1/30/2017
 * Time: 12:58 PM
 */
require '../autoload.php';

$datas = array();
$network = array();

// Possible commands for ifconfig and ip
$commands = array(
    'ifconfig'  =>  array('ifconfig', '/sbin/ifconfig', '/usr/bin/ifconfig', '/usr/sbin/ifconfig'),
    'ip'    =>  array('ip', '/bin/ip', '/sbin/ip', '/usr/bin/ip', 'usr/sbin/ip')
);

// Returns command line fo r retreive interface
function getInterfacesCommand($command)
{

}

// Returns command line for retreive IP address from interface name
function getIpCommand($command, $interface)
{

}

$getInterfaces_cmd = getInterfacesCommand($commands);

if (is_null($getInterfaces_cmd) || !(exec($getInterfaces_cmd, $getInterfaces)))

echo json_encode($datas);