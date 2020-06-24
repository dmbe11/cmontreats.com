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
    "$_POST": [
      {
        "type": "text",
        "name": "name"
      },
      {
        "type": "text",
        "name": "sku"
      },
      {
        "type": "text",
        "name": "inventory"
      },
      {
        "type": "text",
        "name": "batch"
      },
      {
        "type": "datetime",
        "name": "date"
      }
    ]
  },
  "exec": {
    "steps": [
      "Connections/db",
      {
        "name": "insert1",
        "module": "dbupdater",
        "action": "insert",
        "options": {
          "connection": "db",
          "sql": {
            "type": "insert",
            "values": [
              {
                "table": "products",
                "column": "name",
                "type": "text",
                "value": "{{$_POST.name}}"
              },
              {
                "table": "products",
                "column": "sku",
                "type": "text",
                "value": "{{$_POST.sku}}"
              },
              {
                "table": "products",
                "column": "inventory",
                "type": "text",
                "value": "{{$_POST.inventory}}"
              },
              {
                "table": "products",
                "column": "batch",
                "type": "text",
                "value": "{{$_POST.batch}}"
              },
              {
                "table": "products",
                "column": "date",
                "type": "datetime",
                "value": "{{$_POST.date}}"
              }
            ],
            "table": "products",
            "query": "INSERT INTO products\n(name, sku, inventory, batch, date) VALUES (:P1 /* {{$_POST.name}} */, :P2 /* {{$_POST.sku}} */, :P3 /* {{$_POST.inventory}} */, :P4 /* {{$_POST.batch}} */, :P5 /* {{$_POST.date}} */)",
            "params": [
              {
                "name": ":P1",
                "type": "expression",
                "value": "{{$_POST.name}}"
              },
              {
                "name": ":P2",
                "type": "expression",
                "value": "{{$_POST.sku}}"
              },
              {
                "name": ":P3",
                "type": "expression",
                "value": "{{$_POST.inventory}}"
              },
              {
                "name": ":P4",
                "type": "expression",
                "value": "{{$_POST.batch}}"
              },
              {
                "name": ":P5",
                "type": "expression",
                "value": "{{$_POST.date}}"
              }
            ]
          }
        },
        "meta": [
          {
            "name": "identity",
            "type": "text"
          },
          {
            "name": "affected",
            "type": "number"
          }
        ]
      }
    ]
  }
}
JSON
);
?>