@extends('template/docs')

@section('title', 'API | Admin Data')

@section('content')
    <div class="item">
        <h1>Get All Admin Data</h1>
        <p>Superadmin only</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/admin</p>
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
                "name": string,
                "email": email,
                "email_verified_at": null,
                "gender": string,
                "address": string,
                "phone": string,
                "store_id": integer|default:0,
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
        <h1>Get Admin Detail Data</h1>
        <p>Superadmin only</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/admin/<b>{admin id}</b></p>
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
            "name": string,
            "email": email,
            "email_verified_at": null,
            "gender": string,
            "address": string,
            "phone": string,
            "store_id": integer|default:0,
            "created_at": date,
            "updated_at": date
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Add Admin Data</h1>
        <p>Superadmin only</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/admin</p>
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
        "name": string,
        "email": email,
        "password": password,
        "password_confirmation": password,
        "gender": string,
        "address": string,
        "phone": string,
        "store_id": integer,
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
            "name": string,
            "email": email,
            "gender": string,
            "address": string,
            "phone": string,
            "store_id": integer,
            "created_at": date,
            "updated_at": date
            "id": integer,
            "roles": [...]
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Update Admin Data</h1>
        <p>Superadmin only</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/admin/<b>{admin_id}</b></p>
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
        "name": string,
        "email": email,
        "gender": string,
        "address": string,
        "phone": string,
        "store_id": integer,
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
            "name": string,
            "email": email,
            "email_verified_at": null,
            "gender": string,
            "address": string,
            "phone": string,
            "store_id": integer|default:0,
            "created_at": date,
            "updated_at": date
        }
    }
                </pre>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Delete Admin Data</h1>
        <p>Superadmin only</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/admin/<b>{admin_id}</b></p>
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