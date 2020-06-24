<?php
require('../../../dmxConnectLib/dmxConnect.php');


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
    ],
    "$_POST": [
      {
        "type": "number",
        "name": "id"
      },
      {
        "type": "text",
        "name": "created"
      },
      {
        "type": "text",
        "name": "type"
      },
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "object",
            "name": "object",
            "sub": [
              {
                "type": "text",
                "name": "customer-email"
              },
              {
                "type": "text",
                "name": "payment_intent"
              }
            ]
          }
        ]
      },
      {
        "type": "text",
        "name": "name"
      },
      {
        "type": "text",
        "name": "sku"
      },
      {
        "type": "number",
        "name": "price"
      },
      {
        "type": "number",
        "name": "quantity"
      },
      {
        "type": "number",
        "name": "prod_id"
      },
      {
        "type": "text",
        "name": "payment_intent"
      },
      {
        "type": "number",
        "name": "paid"
      },
      {
        "type": "number",
        "name": "id"
      }
    ]
  },
  "exec": {
    "steps": [
      "Connections/db",
      {
        "name": "query1",
        "module": "dbconnector",
        "action": "select",
        "options": {
          "connection": "db",
          "sql": {
            "type": "SELECT",
            "columns": [
              {
                "table": "orders",
                "column": "payment_intent"
              }
            ],
            "table": {
              "name": "orders"
            },
            "joins": [],
            "wheres": {
              "condition": "AND",
              "rules": [
                {
                  "id": "orders.payment_intent",
                  "field": "orders.payment_intent",
                  "type": "string",
                  "operator": "equal",
                  "value": "{{$_POST.data.object.payment_intent}}",
                  "data": {
                    "table": "orders",
                    "column": "payment_intent",
                    "type": "text"
                  },
                  "operation": "="
                }
              ],
              "conditional": null,
              "valid": true
            },
            "query": "SELECT payment_intent\nFROM orders\nWHERE payment_intent = :P1 /* {{$_POST.data.object.payment_intent}} */",
            "params": [
              {
                "operator": "equal",
                "type": "expression",
                "name": ":P1",
                "value": "{{$_POST.data.object.payment_intent}}"
              }
            ]
          }
        },
        "output": true,
        "meta": [
          {
            "name": "payment_intent",
            "type": "text"
          }
        ],
        "outputType": "array"
      },
      {
        "name": "update1",
        "module": "dbupdater",
        "action": "update",
        "options": {
          "connection": "db",
          "sql": {
            "type": "update",
            "values": [
              {
                "table": "orders",
                "column": "name",
                "type": "text",
                "value": "{{$_POST.name}}"
              },
              {
                "table": "orders",
                "column": "sku",
                "type": "text",
                "value": "{{$_POST.sku}}"
              },
              {
                "table": "orders",
                "column": "price",
                "type": "number",
                "value": "{{$_POST.price}}"
              },
              {
                "table": "orders",
                "column": "quantity",
                "type": "number",
                "value": "{{$_POST.quantity}}"
              },
              {
                "table": "orders",
                "column": "prod_id",
                "type": "number",
                "value": "{{$_POST.prod_id}}"
              },
              {
                "table": "orders",
                "column": "payment_intent",
                "type": "text",
                "value": "{{$_POST.payment_intent}}"
              },
              {
                "table": "orders",
                "column": "paid",
                "type": "number",
                "value": "{{$_POST.paid}}"
              }
            ],
            "table": "orders",
            "wheres": {
              "condition": "AND",
              "rules": [
                {
                  "id": "id",
                  "type": "double",
                  "operator": "equal",
                  "value": "{{$_POST.id}}",
                  "data": {
                    "column": "id"
                  },
                  "operation": "="
                }
              ]
            },
            "query": "UPDATE orders\nSET name = :P1 /* {{$_POST.name}} */, sku = :P2 /* {{$_POST.sku}} */, price = :P3 /* {{$_POST.price}} */, quantity = :P4 /* {{$_POST.quantity}} */, prod_id = :P5 /* {{$_POST.prod_id}} */, payment_intent = :P6 /* {{$_POST.payment_intent}} */, paid = :P7 /* {{$_POST.paid}} */\nWHERE id = :P8 /* {{$_POST.id}} */",
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
                "value": "{{$_POST.price}}"
              },
              {
                "name": ":P4",
                "type": "expression",
                "value": "{{$_POST.quantity}}"
              },
              {
                "name": ":P5",
                "type": "expression",
                "value": "{{$_POST.prod_id}}"
              },
              {
                "name": ":P6",
                "type": "expression",
                "value": "{{$_POST.payment_intent}}"
              },
              {
                "name": ":P7",
                "type": "expression",
                "value": "{{$_POST.paid}}"
              },
              {
                "operator": "equal",
                "type": "expression",
                "name": ":P8",
                "value": "{{$_POST.id}}"
              }
            ]
          }
        },
        "meta": [
          {
            "name": "affected",
            "type": "number"
          }
        ],
        "output": true
      },
      {
        "name": "",
        "module": "core",
        "action": "response",
        "options": {
          "status": 200
        }
      }
    ]
  }
}
JSON
);
?>