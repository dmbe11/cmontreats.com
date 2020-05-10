<?php
// Database Type : "MySQL"
// Database Adapter : "mysql"
$exports = <<<'JSON'
{
    "name": "db",
    "module": "dbconnector",
    "action": "connect",
    "options": {
        "server": "mysql",
        "connectionString": "mysql:host=db;sslverify=false;port=3306;dbname=cmontreats;user=db_user;password=AaufECyJ;charset=utf8",
        "meta"  : {"allTables":["contacts","orders","wappler_migrations","wappler_migrations_lock"],"allViews":[],"tables":{"contacts":{"columns":{"idcontacts":{"type":"int","primary":true},"name":{"type":"varchar","size":45,"nullable":true},"email":{"type":"varchar","size":45,"nullable":true},"message":{"type":"mediumtext","size":16777215,"nullable":true}}}}}
    }
}
JSON;
?>