<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "settings": {
    "options": {}
  },
  "meta": {
    "options": {},
    "$_GET": [
      {
        "type": "text",
        "name": "sort"
      },
      {
        "type": "text",
        "name": "dir"
      }
    ]
  },
  "exec": {
    "steps": [
      "Connections/db",
      {
        "name": "dataStorageQuery",
        "module": "dbconnector",
        "action": "select",
        "options": {
          "connection": "db",
          "sql": {
            "type": "SELECT",
            "columns": [
              {
                "table": "usageTimes",
                "column": "storageProcess"
              },
              {
                "table": "usageTimes",
                "column": "years"
              }
            ],
            "table": {
              "name": "usageTimes"
            },
            "joins": [],
            "query": "SELECT storageProcess, years\nFROM usageTimes",
            "params": []
          }
        },
        "output": true,
        "meta": [
          {
            "name": "storageProcess",
            "type": "text"
          },
          {
            "name": "years",
            "type": "text"
          }
        ],
        "type": "dbconnector_select",
        "outputType": "array"
      }
    ]
  }
}
JSON
);
?>