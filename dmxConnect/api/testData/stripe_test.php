<?php
require('../../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "settings": {
    "options": {}
  },
  "meta": {
    "options": {
      "linkedFile": "/checkout/checkout.php",
      "linkedForm": "cartForm"
    },
    "$_POST": [
      {
        "type": "array",
        "name": "record",
        "sub": [
          {
            "type": "text",
            "fieldName": "record[{{$index}}][productID]",
            "name": "productID"
          },
          {
            "type": "number",
            "fieldName": "record[{{$index}}][lineQty]",
            "name": "lineQty"
          },
          {
            "type": "text",
            "fieldName": "record[{{$index}}][linePrice]",
            "name": "linePrice"
          }
        ]
      }
    ]
  },
  "exec": {
    "steps": [
      "Connections/db",
      {
        "name": "record_repeat",
        "module": "core",
        "action": "repeat",
        "options": {
          "repeat": "{{$_POST.record}}",
          "outputFields": [
            "productID",
            "lineQty",
            "linePrice"
          ],
          "exec": {
            "steps": {
              "name": "record_insert",
              "module": "dbupdater",
              "action": "insert",
              "options": {
                "connection": "db",
                "sql": {
                  "type": "insert",
                  "values": [
                    {
                      "table": "order_lines",
                      "column": "lineQty",
                      "type": "number",
                      "value": "{{lineQty}}"
                    },
                    {
                      "table": "order_lines",
                      "column": "productID",
                      "type": "text",
                      "value": "{{productID}}"
                    },
                    {
                      "table": "order_lines",
                      "column": "linePrice",
                      "type": "text",
                      "value": "{{linePrice}}"
                    }
                  ],
                  "table": "order_lines",
                  "query": "INSERT INTO order_lines\n(lineQty, productID, linePrice) VALUES (:P1 /* {{lineQty}} */, :P2 /* {{productID}} */, :P3 /* {{linePrice}} */)",
                  "params": [
                    {
                      "name": ":P1",
                      "type": "expression",
                      "value": "{{lineQty}}"
                    },
                    {
                      "name": ":P2",
                      "type": "expression",
                      "value": "{{productID}}"
                    },
                    {
                      "name": ":P3",
                      "type": "expression",
                      "value": "{{linePrice}}"
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
              ],
              "output": true
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
          },
          {
            "name": "productID",
            "type": "text"
          },
          {
            "name": "lineQty",
            "type": "number"
          },
          {
            "name": "linePrice",
            "type": "text"
          },
          {
            "name": "record_insert",
            "type": "text",
            "sub": [
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
        ],
        "output": true,
        "outputType": "array"
      }
    ]
  }
}
JSON
);
?>