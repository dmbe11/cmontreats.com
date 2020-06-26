dmx.config({
  "cmonStore": {
    "repeat1": {
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
          "type": "text"
        },
        {
          "name": "sku",
          "type": "text"
        },
        {
          "name": "quantity",
          "type": "text"
        },
        {
          "name": "pictureURL",
          "type": "text"
        }
      ],
      "outputType": "object"
    },
    "cart": [
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
        "type": "text",
        "name": "name"
      },
      {
        "type": "number",
        "name": "id"
      }
    ],
    "record": {
      "meta": [
        {
          "name": "$id",
          "type": "number"
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
          "type": "text",
          "name": "name"
        },
        {
          "type": "number",
          "name": "id"
        }
      ],
      "outputType": "array"
    }
  },
  "mystore": {
    "cart": [
      {
        "type": "text",
        "name": "prd_id"
      },
      {
        "type": "text",
        "name": "prd_name"
      },
      {
        "type": "number",
        "name": "prd_price"
      },
      {
        "type": "number",
        "name": "quantity"
      }
    ],
    "repeat1": {
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
          "name": "sku",
          "type": "text"
        },
        {
          "name": "quantity",
          "type": "text"
        },
        {
          "name": "pictureURL",
          "type": "text"
        }
      ],
      "outputType": "object"
    },
    "Repeat1": {
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
      "outputType": "array"
    },
    "tableRepeat1": {
      "meta": [
        {
          "name": "$index",
          "type": "number"
        },
        {
          "name": "$key",
          "type": "text"
        },
        {
          "name": "$value",
          "type": "object"
        },
        {
          "name": "$id",
          "type": "number"
        },
        {
          "type": "number",
          "name": "prd_id"
        },
        {
          "type": "text",
          "name": "prd_name"
        },
        {
          "type": "number",
          "name": "prd_price"
        },
        {
          "type": "text",
          "name": "prd_sku"
        },
        {
          "type": "number",
          "name": "quantity"
        }
      ],
      "outputType": "array"
    },
    "repeat2": {
      "meta": [
        {
          "name": "$index",
          "type": "number"
        },
        {
          "name": "$key",
          "type": "text"
        },
        {
          "name": "$value",
          "type": "object"
        },
        {
          "name": "$id",
          "type": "number"
        },
        {
          "type": "number",
          "name": "prd_id"
        },
        {
          "type": "text",
          "name": "prd_name"
        },
        {
          "type": "number",
          "name": "prd_price"
        },
        {
          "type": "text",
          "name": "prd_sku"
        },
        {
          "type": "number",
          "name": "quantity"
        }
      ],
      "outputType": "array"
    },
    "record": {
      "meta": [
        {
          "name": "$index",
          "type": "number"
        },
        {
          "name": "$key",
          "type": "text"
        },
        {
          "name": "$value",
          "type": "object"
        },
        {
          "name": "$id",
          "type": "number"
        },
        {
          "type": "number",
          "name": "prd_id"
        },
        {
          "type": "text",
          "name": "prd_name"
        },
        {
          "type": "number",
          "name": "prd_price"
        },
        {
          "type": "text",
          "name": "prd_sku"
        },
        {
          "type": "number",
          "name": "quantity"
        }
      ],
      "outputType": "array"
    }
  },
  "shopProducts": {
    "repeat1": {
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
          "type": "text"
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
          "type": "text"
        },
        {
          "name": "inventory",
          "type": "text"
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
  },
  "store": {
    "cart": [
      {
        "type": "text",
        "name": "prd_id"
      },
      {
        "type": "text",
        "name": "prd_name"
      },
      {
        "type": "number",
        "name": "prd_price"
      },
      {
        "type": "number",
        "name": "quantity"
      }
    ],
    "cardrepeat": {
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
      "outputType": "array"
    }
  }
});
