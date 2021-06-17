@extends('template/docs')

@section('title', 'API | Store Data')

@section('content')
    <div class="item">
        <h1>Get All Store Data</h1>
        <p>Superadmin only</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/store</p>
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
                "store": string,
                "last_active": date,
                "whatsapp_number": string,
                "description": string,
                "rating": decimal,
                "region": string,
                "created_at": date,
                "updated_at": date
            },
            ...
        ]
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Get Store Detail Data</h1>
        <p>Superadmin only</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/store/<b>{store id}</b></p>
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
            "store": string,
            "last_active": date,
            "whatsapp_number": string,
            "description": string,
            "rating": decimal,
            "region": string,
            "created_at": date,
            "updated_at": date
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Add Store Data</h1>
        <p>Superadmin only</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/store</p>
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
        "store": string,
        "whatsapp_number": string,
        "region": string,
        "description": string|optional
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
            "store": string,
            "whatsapp_number": string,
            "region": string,
            "description": string,
            "updated_at": date,
            "created_at": date,
            "id": integer
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Update Store Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/store/<b>{store_id}</b></p>
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
        "store": string|optional,
        "whatsapp_number": string|optional,
        "region": string|optional,
        "description": string|optional
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
            "store": string,
            "last_active": date,
            "whatsapp_number": string,
            "description": string,
            "rating": decimal,
            "region": string,
            "created_at": date,
            "updated_at": date
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Delete Store Data</h1>
        <p>Superadmin only</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/store/<b>{store_id}</b></p>
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
@endsection