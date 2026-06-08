<?php
    function log_msg(string $type, string $msg) {
        $log_file = __DIR__ . '\..\logs\app.log';
        $log_line = sprintf("[%s] [%s] %s\n", date('Y-m-d H:i:s'), strtoupper($type), $msg);
        error_log($log_line, 3, $log_file);
    }
?>