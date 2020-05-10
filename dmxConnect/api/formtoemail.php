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
      "linkedFile": "/contact.html",
      "linkedForm": "serverconnectform1"
    },
    "$_POST": [
      {
        "type": "text",
        "fieldName": "name",
        "name": "name"
      },
      {
        "type": "text",
        "fieldName": "email",
        "options": {
          "rules": {
            "core:email": {}
          }
        },
        "name": "email"
      },
      {
        "type": "text",
        "fieldName": "message",
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
                "table": "contacts",
                "column": "name",
                "type": "text",
                "value": "{{$_POST.name}}"
              },
              {
                "table": "contacts",
                "column": "email",
                "type": "text",
                "value": "{{$_POST.email}}"
              },
              {
                "table": "contacts",
                "column": "message",
                "type": "text",
                "value": "{{$_POST.message}}"
              }
            ],
            "table": "contacts",
            "query": "INSERT INTO contacts\n(name, email, message) VALUES (:P1 /* {{$_POST.name}} */, :P2 /* {{$_POST.email}} */, :P3 /* {{$_POST.message}} */)",
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
      },
      {
        "name": "mail1",
        "module": "mail",
        "action": "setup",
        "options": {
          "host": "smtp.sendgrid.net",
          "port": 465,
          "useSSL": true,
          "username": "apikey",
          "password": "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"
        }
      },
      {
        "name": "",
        "module": "mail",
        "action": "send",
        "options": {
          "instance": "mail1",
          "subject": "contact form results",
          "fromEmail": "daniel.bell@cmontreats.com",
          "toEmail": "daniel.bell@cmontreats.com",
          "body": "This Message was sent from {{$_POST.name}}\nat this {{$_POST.email}}\nwith this additional content {{$_POST.message}}",
          "replyTo": "{{$_POST.email}}",
          "toName": "info account",
          "fromName": "{{$_POST.name}}"
        }
      }
    ]
  }
}
JSON
);
?>