<?php

//MySQL
$mysql_conf = @file_get_contents("/etc/mysql/my.cnf");
$output= preg_replace("/max_allowed_packet[\s]*=[\s]*[0-9]+M/", "max_allowed_packet	= 32M", $mysql_conf);
@file_put_contents("/etc/mysql/my.cnf", $output);

//PHP
$php_conf = @file_get_contents("/etc/php5/apache2/php.ini");
$output= preg_replace("/short_open_tag[\s]*=[\s]*Off/", "short_open_tag = On", $php_conf);
@file_put_contents("/etc/php5/apache2/php.ini", $output);

$php_conf = @file_get_contents("/etc/php5/apache2/php.ini");
$output= preg_replace("/upload_max_filesize[\s]*=[\s]*[0-9]+M/", "upload_max_filesize = 4G", $php_conf);
@file_put_contents("/etc/php5/apache2/php.ini", $output);

$php_conf = @file_get_contents("/etc/php5/apache2/php.ini");
$output= preg_replace("/post_max_size[\s]*=[\s]*[0-9]+M/", "post_max_size = 4G", $php_conf);
@file_put_contents("/etc/php5/apache2/php.ini", $output);

$php_conf = @file_get_contents("/etc/php5/apache2/php.ini");
$output= preg_replace("/memory_limit[\s]*=[\s]*[0-9]+M/", "memory_limit = 2048M", $php_conf);
@file_put_contents("/etc/php5/apache2/php.ini", $output);

$php_conf = @file_get_contents("/etc/php5/apache2/php.ini");
$output= preg_replace("/max_execution_time[\s]*=[\s]*[0-9]+/", "max_execution_time = 1200", $php_conf);
@file_put_contents("/etc/php5/apache2/php.ini", $output);

$php_conf = @file_get_contents("/etc/php5/apache2/php.ini");
$output= preg_replace("/max_input_time[\s]*=[\s]*[0-9]+/", "max_input_time = 1200", $php_conf);
@file_put_contents("/etc/php5/apache2/php.ini", $output);



