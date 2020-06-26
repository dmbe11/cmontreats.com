<?php
require('../../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
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
      {
        "name": "productQuery",
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
                "column": "prod_id"
              },
              {
                "table": "products",
                "column": "api_id"
              },
              {
                "table": "products",
                "column": "sku"
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
            "query": "SELECT id, prod_id, api_id, sku, name, Description, price, size, quantity, inventory, pictureURL, batch, date, checkout, UPC, buyurl\nFROM products",
            "params": []
          }
        },
        "meta": [
          {
            "name": "id",
            "type": "number"
          },
          {
            "name": "prod_id",
            "type": "text"
          },
          {
            "name": "api_id",
            "type": "text"
          },
          {
            "name": "sku",
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
            "name": "size",
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
        "outputType": "array",
        "output": true
      },
      "Connections/db"
    ]
  }
}
JSON
);
?>