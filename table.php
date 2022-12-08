<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @AlaCode
//-------------------------

// ------- Sql Code -------
include("config.php");

mysqli_multi_query(
    $conn,
    "CREATE TABLE `users` (
        `id` bigint PRIMARY KEY,
        `step` varchar(20),
        `refral` bigint,
        `coin` bigint,
        `phone` bigint,
        `refid` bigint
        ) default charset = utf8mb4;");
    if (mysqli_connect_errno()) {
    echo "به دلیل مشکل زیر، اتصال برقرار نشد : <br />" . mysqli_connect_error();
    die();
}
echo "دیتابیس متصل و نصب شد .";
?>