<?php
$exports = <<<'JSON'
{
  "name": "db",
  "module": "dbconnector",
  "action": "connect",
  "options": {
    "server": "mysql",
    "databaseType": "MySQL",
    "connectionString": "mysql:host=db;sslverify=false;port=3306;dbname=cmontreats;user=db_user;password=AaufECyJ;charset=utf8",
    "meta": {
      "allTables": [
        "contacts",
        "customers",
        "orderLines",
        "order_lines",
        "orders",
        "products",
        "usageTimes"
      ],
      "allViews": [],
      "tables": {
        "usageTimes": {
          "columns": {
            "id": {
              "type": "int",
              "primary": true
            },
            "storageProcess": {
              "type": "varchar",
              "size": 255,
              "nullable": true
            },
            "years": {
              "type": "varchar",
              "size": 10,
              "nullable": true,
              "defaultValue": "25"
            }
          }
        },
        "products": {
          "columns": {
            "id": {
              "type": "int",
              "primary": true
            },
            "testData": {
              "type": "varchar",
              "size": 10,
              "nullable": true
            },
            "prod_id": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "api_id": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "price": {
              "type": "int",
              "nullable": true
            },
            "sku": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "name": {
              "type": "varchar",
              "size": 250,
              "nullable": true
            },
            "Description": {
              "type": "text",
              "size": 65535,
              "nullable": true
            },
            "size": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "quantity": {
              "type": "int",
              "nullable": true
            },
            "inventory": {
              "type": "int",
              "nullable": true
            },
            "pictureURL": {
              "type": "varchar",
              "size": 255,
              "nullable": true
            },
            "batch": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "date": {
              "type": "datetime",
              "nullable": true
            },
            "checkout": {
              "type": "blob",
              "size": 65535,
              "nullable": true
            },
            "UPC": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "buyurl": {
              "type": "varchar",
              "size": 255,
              "nullable": true
            }
          }
        },
        "orders": {
          "columns": {
            "id": {
              "type": "int",
              "defaultValue": "12",
              "primary": true
            },
            "name": {
              "type": "varchar",
              "size": 150,
              "nullable": true
            },
            "sku": {
              "type": "varchar",
              "size": 100,
              "nullable": true
            },
            "price": {
              "type": "float",
              "nullable": true
            },
            "quantity": {
              "type": "int",
              "nullable": true
            },
            "prod_id": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "payment_intent": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "paid": {
              "type": "tinyint",
              "nullable": true
            }
          }
        },
        "customers": {
          "columns": {
            "id": {
              "type": "int",
              "primary": true
            },
            "stripeCustomerID": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "email": {
              "type": "varchar",
              "size": 60,
              "nullable": true
            },
            "name": {
              "type": "varchar",
              "size": 60,
              "nullable": true
            },
            "password": {
              "type": "varchar",
              "size": 64,
              "nullable": true
            }
          }
        },
        "contacts": {
          "columns": {
            "idcontacts": {
              "type": "int",
              "primary": true
            },
            "name": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "email": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "message": {
              "type": "mediumtext",
              "size": 16777215,
              "nullable": true
            }
          }
        },
        "order_lines": {
          "columns": {
            "idorder_lines": {
              "type": "int",
              "primary": true
            },
            "lineQty": {
              "type": "int",
              "nullable": true
            },
            "productID": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            },
            "linePrice": {
              "type": "varchar",
              "size": 45,
              "nullable": true
            }
          }
        }
      }
    }
  }
}
JSON;
?>