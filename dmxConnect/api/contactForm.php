<?php
require('../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "settings": {
    "options": {}
  },
  "meta": {
    "options": {
      "linkedFile": "/contact.html"
    },
    "$_POST": [
      {
        "type": "text",
        "name": "name"
      },
      {
        "type": "text",
        "name": "email"
      },
      {
        "type": "text",
        "name": "phone"
      },
      {
        "type": "text",
        "name": "message"
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
                "table": "contactInfo",
                "column": "name",
                "type": "text",
                "value": "{{$_POST.name}}"
              },
              {
                "table": "contactInfo",
                "column": "email",
                "type": "text",
                "value": "{{$_POST.email}}"
              },
              {
                "table": "contactInfo",
                "column": "phone",
                "type": "text",
                "value": "{{$_POST.phone}}"
              },
              {
                "table": "contactInfo",
                "column": "message",
                "type": "text",
                "value": "{{$_POST.message}}"
              }
            ],
            "table": "contactInfo",
            "query": "INSERT INTO contactInfo\n(name, email, phone, message) VALUES (:P1 /* {{$_POST.name}} */, :P2 /* {{$_POST.email}} */, :P3 /* {{$_POST.phone}} */, :P4 /* {{$_POST.message}} */)",
            "params": [
              {
                "name": ":P1",
                "type": "expression",
                "value": "{{$_POST.name}}"
              },
              {
                "name": ":P2",
                "type": "expression",
                "value": "{{$_POST.email}}"
              },
              {
                "name": ":P3",
                "type": "expression",
                "value": "{{$_POST.phone}}"
              },
              {
                "name": ":P4",
                "type": "expression",
                "value": "{{$_POST.message}}"
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