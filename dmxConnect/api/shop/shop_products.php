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
    ]
  },
  "exec": {
    "steps": [
      "Connections/db",
      {
        "name": "shopQ",
        "module": "dbconnector",
        "action": "select",
        "options": {
          "connection": "db",
          "sql": {
            "type": "SELECT",
            "columns": [
              {
                "table": "products",
                "column": "id"
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
                "column": "size"
              },
              {
                "table": "products",
                "column": "sku"
              },
              {
                "table": "products",
                "column": "quantity"
              },
              {
                "table": "products",
                "column": "inventory"
              },
              {
                "table": "products",
                "column": "pictureURL"
              },
              {
                "table": "products",
                "column": "batch"
              },
              {
                "table": "products",
                "column": "date"
              },
              {
                "table": "products",
                "column": "checkout"
              },
              {
                "table": "products",
                "column": "UPC"
              },
              {
                "table": "products",
                "column": "buyurl"
              }
            ],
            "table": {
              "name": "products"
            },
            "joins": [],
            "query": "SELECT id, name, Description, price, size, sku, quantity, inventory, pictureURL, batch, date, checkout, UPC, buyurl\nFROM products",
            "params": []
          }
        },
        "output": true,
        "meta": [
          {
            "name": "id",
            "type": "number"
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
            "name": "size",
            "type": "text"
          },
          {
            "name": "sku",
            "type": "text"
          },
          {
            "name": "quantity",
            "type": "number"
          },
          {
            "name": "inventory",
            "type": "number"
          },
          {
            "name": "pictureURL",
            "type": "text"
          },
          {
            "name": "batch",
            "type": "text"
          },
          {
            "name": "date",
            "type": "datetime"
          },
          {
            "name": "checkout",
            "type": "text"
          },
          {
            "name": "UPC",
            "type": "text"
          },
          {
            "name": "buyurl",
            "type": "text"
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