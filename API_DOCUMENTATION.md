# API Documentation - tugasweb2

## Base URL
```
http://localhost:8000/api
```

## Product Endpoints

### 1. Get All Products
```
GET /api/products
```
**Response (200):**
```json
{
  "message": "Data produk berhasil diambil",
  "data": [
    {
      "id": 1,
      "name": "Product Name",
      "description": "Product Description",
      "price": "19.99",
      "created_at": "2026-04-20T12:39:32.000000Z",
      "updated_at": "2026-04-20T12:39:32.000000Z"
    }
  ]
}
```

### 2. Get Single Product
```
GET /api/products/{id}
```
**Response (200):**
```json
{
  "message": "Data produk berhasil diambil",
  "data": {
    "id": 1,
    "name": "Product Name",
    "description": "Product Description",
    "price": "19.99",
    "created_at": "2026-04-20T12:39:32.000000Z",
    "updated_at": "2026-04-20T12:39:32.000000Z"
  }
}
```

### 3. Create New Product
```
POST /api/products
Content-Type: application/json

{
  "name": "Product Name",
  "description": "Product Description",
  "price": 19.99
}
```
**Response (201):**
```json
{
  "message": "Data produk berhasil ditambah",
  "data": {
    "id": 1,
    "name": "Product Name",
    "description": "Product Description",
    "price": "19.99",
    "created_at": "2026-04-20T12:39:32.000000Z",
    "updated_at": "2026-04-20T12:39:32.000000Z"
  }
}
```

### 4. Update Product
```
PUT /api/products/{id}
Content-Type: application/json

{
  "name": "Updated Name",
  "description": "Updated Description",
  "price": 29.99
}
```
**Response (200):**
```json
{
  "message": "Data produk berhasil diubah",
  "data": {
    "id": 1,
    "name": "Updated Name",
    "description": "Updated Description",
    "price": "29.99",
    "created_at": "2026-04-20T12:39:32.000000Z",
    "updated_at": "2026-04-20T12:39:32.000000Z"
  }
}
```

### 5. Delete Product
```
DELETE /api/products/{id}
```
**Response (200):**
```json
{
  "message": "Data produk berhasil dihapus"
}
```

## Validation Rules

### Create/Update Product
- `name` - Required, string, max 255 characters
- `description` - Optional, string
- `price` - Required, numeric, minimum 0

## Error Responses

### 404 Not Found
```json
{
  "error": "Produk tidak ditemukan"
}
```

### 500 Server Error
```json
{
  "error": "Error message details"
}
```

### 422 Validation Error
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "name": ["The name field is required."],
    "price": ["The price must be a number."]
  }
}
```
