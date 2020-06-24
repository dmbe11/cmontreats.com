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
            "fieldName": "record[{{$index}}][productID]",
            "name": "productID"
          },
          {
            "type": "text",
            "fieldName": "record[{{$index}}][lineQty]",
            "name": "lineQty"
          },
          {
            "type": "text",
            "fieldName": "record[{{$index}}][linePrice]",
            "name": "linePrice"
          },
          {
            "type": "number",
            "name": "quantity"
          },
          {
            "type": "text",
            "name": "prd_id"
          },
          {
            "type": "text",
            "name": "api_id"
          }
        ]
      },
      {
        "type": "number",
        "name": "id"
      },
      {
        "type": "number",
        "name": "quantity"
      },
      {
        "type": "text",
        "name": "prod_id"
      },
      {
        "type": "text",
        "name": "payment_intent"
      },
      {
        "type": "number",
        "name": "paid"
      }
    ]
  },
  "exec": {
    "steps": [
      "Connections/db",
      {
        "name": "insertOrderStep1",
        "module": "dbupdater",
        "action": "insert",
        "options": {
          "connection": "db",
          "sql": {
            "type": "insert",
            "values": [
              {
                "table": "orders",
                "column": "id",
                "type": "number",
                "value": "{{$_POST.id}}"
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
                "type": "text",
                "value": "{{$_POST.prod_id}}"
              }
            ],
            "table": "orders",
            "query": "INSERT INTO orders\n(id, quantity, prod_id) VALUES (:P1 /* {{$_POST.id}} */, :P2 /* {{$_POST.quantity}} */, :P3 /* {{$_POST.prod_id}} */)",
            "params": [
              {
                "name": ":P1",
                "type": "expression",
                "value": "{{$_POST.id}}"
              },
              {
                "name": ":P2",
                "type": "expression",
                "value": "{{$_POST.quantity}}"
              },
              {
                "name": ":P3",
                "type": "expression",
                "value": "{{$_POST.prod_id}}"
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
            "steps": [
              {
                "name": "queryTotalPrice",
                "module": "dbconnector",
                "action": "select",
                "options": {
                  "connection": "db",
                  "sql": {
                    "type": "SELECT",
                    "columns": [
                      {
                        "table": "products",
                        "column": "prod_id"
                      },
                      {
                        "table": "products",
                        "column": "price"
                      }
                    ],
                    "table": {
                      "name": "products"
                    },
                    "joins": [],
                    "query": "SELECT prod_id, price\nFROM products",
                    "params": []
                  }
                },
                "output": true,
                "meta": [
                  {
                    "name": "prod_id",
                    "type": "text"
                  },
                  {
                    "name": "price",
                    "type": "number"
                  }
                ],
                "outputType": "array"
              },
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
                        "table": "order_lines",
                        "column": "quantity",
                        "type": "number",
                        "value": "{{lineQty}}"
                      },
                      {
                        "table": "order_lines",
                        "column": "prd_id",
                        "type": "text",
                        "value": "{{productID}}"
                      },
                      {
                        "table": "order_lines",
                        "column": "api_id",
                        "type": "text",
                        "value": "{{linePrice}}"
                      }
                    ],
                    "table": "order_lines",
                    "query": "INSERT INTO order_lines\n(quantity, prd_id, api_id) VALUES (:P1 /* {{lineQty}} */, :P2 /* {{productID}} */, :P3 /* {{linePrice}} */)",
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
            ]
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
            "type": "text"
          },
          {
            "name": "linePrice",
            "type": "text"
          },
          {
            "name": "quantity",
            "type": "number"
          },
          {
            "name": "prd_id",
            "type": "text"
          },
          {
            "name": "api_id",
            "type": "text"
          },
          {
            "name": "queryTotalPrice",
            "type": "array",
            "sub": [
              {
                "name": "prod_id",
                "type": "text"
              },
              {
                "name": "price",
                "type": "number"
              }
            ]
          },
          {
            "name": "insert1",
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
        "outputType": "array",
        "output": true,
        "disabled": true
      },
      {
        "name": "totalPrice",
        "module": "dbconnector",
        "action": "select",
        "options": {
          "connection": "db",
          "sql": {
            "type": "SELECT",
            "columns": [
              {
                "table": "products",
                "column": "prod_id"
              },
              {
                "table": "products",
                "column": "api_id"
              },
              {
                "table": "products",
                "column": "name"
              },
              {
                "table": "products",
                "column": "Description"
              },
              {
                "table": "products",
                "column": "price"
              },
              {
                "table": "products",
                "column": "quantity"
              },
              {
                "table": "orderlines",
                "column": "lineQty"
              },
              {
                "table": "orderlines",
                "column": "productID"
              },
              {
                "table": "orderlines",
                "column": "linePrice"
              }
            ],
            "table": {
              "name": "products"
            },
            "joins": [
              {
                "table": "order_lines",
                "column": "*",
                "alias": "orderlines",
                "type": "LEFT",
                "clauses": {
                  "condition": "AND",
                  "rules": [
                    {
                      "table": "orderlines",
                      "column": "linePrice",
                      "operator": "equal",
                      "value": {
                        "table": "products",
                        "column": "price"
                      },
                      "operation": "="
                    }
                  ]
                }
              }
            ],
            "query": "SELECT products.prod_id, products.api_id, products.name, products.Description, products.price, products.quantity, orderlines.lineQty, orderlines.productID, orderlines.linePrice\nFROM products\nLEFT JOIN order_lines AS orderlines ON (orderlines.linePrice = products.price)",
            "params": []
          }
        },
        "output": true,
        "meta": [
          {
            "name": "prod_id",
            "type": "text"
          },
          {
            "name": "api_id",
            "type": "text"
          },
          {
            "name": "name",
            "type": "text"
          },
          {
            "name": "Description",
            "type": "text"
          },
          {
            "name": "price",
            "type": "number"
          },
          {
            "name": "quantity",
            "type": "number"
          },
          {
            "name": "lineQty",
            "type": "number"
          },
          {
            "name": "productID",
            "type": "text"
          },
          {
            "name": "linePrice",
            "type": "text"
          }
        ],
        "outputType": "array"
      },
      {
        "name": "stripe",
        "module": "api",
        "action": "send",
        "options": {
          "url": "https://api.stripe.com/v1/products",
          "data": {
            "success_url": "https://cmontreats.com/checkout/sucess",
            "cancel_url": "https://cmontreats.com/checkout/cancel",
            "mode": "payment",
            "payment_method_types[0]": "card",
            "line_items[0][quantity]": "",
            "line_items[0][price]]": "price_1Gv8LFGmngr5mjuDgcSSysNz",
            "Shipping_address_collection": "1"
          },
          "headers": {
            "Authorization": "Bearer sk_test_jJ14InI56ViQUovM7Tr9IAZP006LpDq1R6"
          },
          "schema": [],
          "dataType": "x-www-form-urlencoded",
          "method": "POST",
          "params": {}
        },
        "meta": [
          {
            "type": "object",
            "name": "data",
            "sub": [
              {
                "type": "text",
                "name": "id"
              },
              {
                "type": "text",
                "name": "object"
              },
              {
                "type": "text",
                "name": "billing_address_collection"
              },
              {
                "type": "text",
                "name": "cancel_url"
              },
              {
                "type": "text",
                "name": "client_reference_id"
              },
              {
                "type": "text",
                "name": "customer"
              },
              {
                "type": "text",
                "name": "customer_email"
              },
              {
                "type": "boolean",
                "name": "livemode"
              },
              {
                "type": "text",
                "name": "locale"
              },
              {
                "type": "object",
                "name": "metadata"
              },
              {
                "type": "text",
                "name": "mode"
              },
              {
                "type": "text",
                "name": "payment_intent"
              },
              {
                "type": "array",
                "name": "payment_method_types",
                "sub": [
                  {
                    "type": "text",
                    "name": "$value"
                  }
                ]
              },
              {
                "type": "text",
                "name": "setup_intent"
              },
              {
                "type": "text",
                "name": "shipping"
              },
              {
                "type": "text",
                "name": "shipping_address_collection"
              },
              {
                "type": "text",
                "name": "submit_type"
              },
              {
                "type": "text",
                "name": "subscription"
              },
              {
                "type": "text",
                "name": "success_url"
              }
            ]
          },
          {
            "type": "object",
            "name": "headers",
            "sub": [
              {
                "type": "text",
                "name": "access-control-allow-credentials"
              },
              {
                "type": "text",
                "name": "access-control-allow-methods"
              },
              {
                "type": "text",
                "name": "access-control-allow-origin"
              },
              {
                "type": "text",
                "name": "access-control-expose-headers"
              },
              {
                "type": "text",
                "name": "access-control-max-age"
              },
              {
                "type": "text",
                "name": "cache-control"
              },
              {
                "type": "text",
                "name": "content-length"
              },
              {
                "type": "text",
                "name": "content-type"
              },
              {
                "type": "text",
                "name": "date"
              },
              {
                "type": "text",
                "name": "request-id"
              },
              {
                "type": "text",
                "name": "server"
              },
              {
                "type": "text",
                "name": "status"
              },
              {
                "type": "text",
                "name": "strict-transport-security"
              },
              {
                "type": "text",
                "name": "stripe-version"
              }
            ]
          }
        ],
        "outputType": "object",
        "output": true
      },
      {
        "name": "insPayment",
        "module": "dbupdater",
        "action": "update",
        "options": {
          "connection": "db"
        },
        "meta": [
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