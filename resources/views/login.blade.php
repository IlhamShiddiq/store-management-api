@extends('template/docs')

@section('title', 'API | Login Logout')

@section('content')
    <div class="item">
        <h1>Login</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/login</p>
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
        "email": email,
        "password": password
    }
                </pre>
            </li>
            <li>
                <h4>Response (JSON)</h4>
                <pre class="prettyprint">

    {
        "success": true,
        "code": 200,
        "message": "Logged In",
        "data": {
            "token": your_token
        }
    }
                </pre>
                <small>Use <b>your token</b> to access another route</small>
            </li>
        </ul>
    </div>
    <div class="item">
        <h1>Logout</h1>
        <p>Available to all role user</p>
        <ul>
            <li>
                <h4>URL</h4>
                <p>/api/logout</p>
            </li>
            <li>
                <h4>Method</h4>
                <p class="red">POST</p>
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
        "message": "Logged Out"
    }
                </pre>
            </li>
        </ul>
    </div>
@endsection