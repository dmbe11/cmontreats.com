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
        "type": "array",
        "name": "record",
        "sub": [
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
            "name": "id"
          }
        ]
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
          "connection": "db"
        },
        "output": true,
        "meta": [],
        "outputType": "array"
      },
      {
        "name": "api1",
        "module": "api",
        "action": "send",
        "options": {
          "url": "https://api.stripe.com/v1/checkout/sessions",
          "method": "POST"
        },
        "output": true
      },
      {
        "name": "record_repeat",
        "module": "core",
        "action": "repeat",
        "options": {
          "repeat": "{{$_POST.record}}",
          "exec": {
            "steps": {
              "name": "record_update",
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
                      "value": "{{name}}"
                    },
                    {
                      "table": "orders",
                      "column": "sku",
                      "type": "text",
                      "value": "{{sku}}"
                    },
                    {
                      "table": "orders",
                      "column": "price",
                      "type": "number",
                      "value": "{{price}}"
                    },
                    {
                      "table": "orders",
                      "column": "quantity",
                      "type": "number",
                      "value": "{{quantity}}"
                    },
                    {
                      "table": "orders",
                      "column": "prod_id",
                      "type": "number",
                      "value": "{{prod_id}}"
                    },
                    {
                      "table": "orders",
                      "column": "payment_intent",
                      "type": "text",
                      "value": "{{payment_intent}}"
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
                        "value": "{{id}}",
                        "data": {
                          "column": "id"
                        },
                        "operation": "="
                      }
                    ]
                  },
                  "query": "UPDATE orders\nSET name = :P1 /* {{name}} */, sku = :P2 /* {{sku}} */, price = :P3 /* {{price}} */, quantity = :P4 /* {{quantity}} */, prod_id = :P5 /* {{prod_id}} */, payment_intent = :P6 /* {{payment_intent}} */\nWHERE id = :P7 /* {{id}} */",
                  "params": [
                    {
                      "name": ":P1",
                      "type": "expression",
                      "value": "{{name}}"
                    },
                    {
                      "name": ":P2",
                      "type": "expression",
                      "value": "{{sku}}"
                    },
                    {
                      "name": ":P3",
                      "type": "expression",
                      "value": "{{price}}"
                    },
                    {
                      "name": ":P4",
                      "type": "expression",
                      "value": "{{quantity}}"
                    },
                    {
                      "name": ":P5",
                      "type": "expression",
                      "value": "{{prod_id}}"
                    },
                    {
                      "name": ":P6",
                      "type": "expression",
                      "value": "{{payment_intent}}"
                    },
                    {
                      "operator": "equal",
                      "type": "expression",
                      "name": ":P7",
                      "value": "{{id}}"
                    }
                  ]
                }
              },
              "meta": [
                {
                  "name": "affected",
                  "type": "number"
                }
              ]
            }
          }
        },
        "meta": [
          {
            "name": "$index",
            "type": "number"
          },
          {
            "name": "$number",
            "type": "number"
          },
          {
            "name": "$name",
            "type": "text"
          },
          {
            "name": "$value",
            "type": "object"
          }
        ],
        "outputType": "array"
      }
    ]
  }
}
JSON
);
?>