<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- @vite('../resources/css/app.css') --}}
</head>

<body
    style="display: flex; flex-direction:column; justify-content: center; align-items: center; background-color: #36454F; color: #D3D3D3;">
    @auth
        <p>Congratulations, you are logged in!</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        <div class="border-2 border-indigo-500"
            style="display: flex; flex-direction:column; justify-content: center; align-items: center;">
            <h2>Create a new post</h2>
            <form action="/create-post" method="post"
                style="display: flex; flex-direction:column; justify-content: center; align-items: center;">
                @csrf
                <input name="title" type="text" placeholder="title">
                <textarea name="body" placeholder="content"></textarea>
                <button>Save post</button>
            </form>
        </div>
        <div class="border-2 border-indigo-500"
            style="display: flex; flex-direction:column; justify-content: center; align-items: center;">
            <h2>Posts</h2>
            @foreach ($posts as $post)
                <div>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                    {{-- <form action="/delete-post/{{ $post->id }}" method="post">
                        @csrf
                        <button>Delete post</button>
                    </form> --}}
                </div>
            @endforeach
        </div>
    @else
        <div class="border-2 border-indigo-500">
            <h2>Register</h2>
            <form action="/register" method="post"
                style="display: flex; flex-direction:column; justify-content: center; align-items: center;">
                @csrf
                <input name="name" type="text" placeholder="name">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button>Register</button>
            </form>
        </div>
        <div class="border-2 border-indigo-500">
            <h2>Login</h2>
            <form action="/login" method="post"
                style="display: flex; flex-direction:column; justify-content: center; align-items: center;">
                @csrf
                <input name="loginname" type="text" placeholder="name">
                <input name="loginpassword" type="password" placeholder="password">
                <button>Log in</button>
            </form>
        </div>
    @endauth



</body>

</html>
