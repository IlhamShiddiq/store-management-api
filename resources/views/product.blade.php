@extends('template/docs')

@section('title', 'API | Product Data')

@section('content')
    <div class="item">
        <h1>Get All Product Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/product</p>
            </li>
            <li>
                <h4>Method</h4>
                <p class="red">GET</p>
            </li>
            <li>
                <h4>Headers</h4>
                <p>Accept : <span class="red">application/json</span></p>
            </li>
            <li>
                <h4>Response (JSON)</h4>
                <pre class="prettyprint">

    {
        "success": true,
        "code": 200,
        "data": [
            {
                "id": integer,
                "store_id": integer,
                "product": string,
                "category_id": integer,
                "price": integer,
                "stock": integer,
                "description": string,
                "created_at": date,
                "updated_at": date,
                "category": string,
                "store": string
            },
            ...
        ]
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Get Product Detail Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/product/<b>{product id}</b></p>
            </li>
            <li>
                <h4>Method</h4>
                <p class="red">GET</p>
            </li>
            <li>
                <h4>Headers</h4>
                <p>Accept : <span class="red">application/json</span></p>
            </li>
            <li>
                <h4>Response (JSON)</h4>
                <pre class="prettyprint">

    {
        "success": true,
        "code": 200,
        "data": {
            "id": integer,
            "store_id": integer,
            "product": string,
            "category_id": integer,
            "price": integer,
            "stock": integer,
            "description": string,
            "created_at": date,
            "updated_at": date,
            "category": string,
            "store": string
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Get List Product by Store Id</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/product/bystore/<b>{store id}</b></p>
            </li>
            <li>
                <h4>Method</h4>
                <p class="red">GET</p>
            </li>
            <li>
                <h4>Headers</h4>
                <p>Accept : <span class="red">application/json</span></p>
            </li>
            <li>
                <h4>Response (JSON)</h4>
                <pre class="prettyprint">

    {
        "success": true,
        "code": 200,
        "data": [
            {
                "id": integer,
                "store_id": integer,
                "product": string,
                "category_id": integer,
                "price": integer,
                "stock": integer,
                "description": string,
                "created_at": date,
                "updated_at": date,
                "category": string,
                "store": string
            },
            ...
        ]
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Add Product Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/product</p>
            </li>
            <li>
                <h4>Method</h4>
                <p class="red">POST</p>
            </li>
            <li>
                <h4>Headers</h4>
                <p>Accept : <span class="red">application/json</span></p>
                <p>Content-Type : <span class="red">application/json</span></p>
            </li>
            <li>
                <h4>Body (JSON)</h4>
                <pre class="prettyprint">

    {
        "store_id": integer,
        "product": string,
        "category_id": integer,
        "price": integer,
        "stock": integer,
        "description": string
    }
                </pre>
            </li>
            <li>
                <h4>Response (JSON)</h4>
                <pre class="prettyprint">

    {
        "success": true,
        "code": 201,
        "message": "Data has created successfully",
        "data": {
            "store_id": integer,
            "product": string,
            "category_id": integer,
            "price": integer,
            "stock": integer,
            "description": string,
            "created_at": date,
            "updated_at": date,
            "id": integer,
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Update Product Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/product/<b>{product_id}</b></p>
            </li>
            <li>
                <h4>Method</h4>
                <p class="red">PUT</p>
            </li>
            <li>
                <h4>Headers</h4>
                <p>Accept : <span class="red">application/json</span></p>
                <p>Content-Type : <span class="red">application/json</span></p>
            </li>
            <li>
                <h4>Body (JSON)</h4>
                <pre class="prettyprint">

    {
        "store_id": integer,
        "product": string,
        "category_id": integer,
        "price": integer,
        "stock": integer,
        "description": string
    }
                </pre>
            </li>
            <li>
                <h4>Response (JSON)</h4>
                <pre class="prettyprint">

    {
        "success": true,
        "code": 200,
        "message": "Data has updated successfully",
        "data": {
            "id": integer,
            "store_id": integer,
            "product": string,
            "category_id": integer,
            "price": integer,
            "stock": integer,
            "description": string,
            "created_at": date,
            "updated_at": date,
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Delete Product Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/product/<b>{product_id}</b></p>
            </li>
            <li>
                <h4>Method</h4>
                <p class="red">DELETE</p>
            </li>
            <li>
                <h4>Headers</h4>
                <p>Accept : <span class="red">application/json</span></p>
            </li>
            <li>
                <h4>Response (JSON)</h4>
                <pre class="prettyprint">

    {
        "success": true,
        "code": 200,
        "message": "Data has deleted successfully"
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Update Stock</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/product/stock/<b>{product_id}</b></p>
            </li>
            <li>
                <h4>Method</h4>
                <p class="red">PUT</p>
            </li>
            <li>
                <h4>Headers</h4>
                <p>Accept : <span class="red">application/json</span></p>
                <p>Content-Type : <span class="red">application/json</span></p>
            </li>
            <li>
                <h4>Body (JSON)</h4>
                <pre class="prettyprint">

    {
        "stock": integer
    }
                </pre>
            </li>
            <li>
                <h4>Response (JSON)</h4>
                <pre class="prettyprint">

    {
        "success": true,
        "code": 200,
        "message": "Data has updated successfully",
        "data": {
            "id": integer,
            "store_id": integer,
            "product": string,
            "category_id": integer,
            "price": integer,
            "stock": integer,
            "description": string,
            "created_at": date,
            "updated_at": date,
        }
    }
                </pre>
            </li>
        </ul>
    </div>
@endsection