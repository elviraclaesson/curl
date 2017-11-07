<?php

function status_header($code = 200) {
    $messege = [
        200 => "OK",
        201 => "Created",
        202 => "Accepted",
        204 => "No Content",
        302 => "Moved Temporarily (HTTP/1.0)",
        302 => "See Other (HTTP/1.1)",
        400 => "Bad Request",
        403 => "Forbidden",
        404 => "Not Found",
        500 => "Internal Server Error",
        502 => "Bad gateway"
        
    ];

    header("HTTP/1.0 ".$code." ".$messege[$code]);
}
status_header(404);