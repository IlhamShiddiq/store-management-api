@extends('template/docs')

@section('title', 'API | Category Data')

@section('content')
    <div class="item">
        <h1>Get All Category Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/category</p>
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
                "category": string,
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
        <h1>Get Category Detail Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/category/<b>{category id}</b></p>
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
            "category": string,
            "created_at": date,
            "updated_at": date
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Add Category Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/category</p>
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
        "category": string
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
            "category": string,
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
        <h1>Update Category Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/category/<b>{category_id}</b></p>
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
        "category": string
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
            "id": integer
            "category": string,
            "updated_at": date,
            "created_at": date,
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Delete Category Data</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/category/<b>{category_id}</b></p>
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