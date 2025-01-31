<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('../resources/css/app.css')
</head>

<body>
    <div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="w-auto h-10 mx-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-10 font-bold tracking-tight text-center text-gray-900 text-2xl/9">Sign in to your account</h2>
        </div>

        @auth
            <p>Congratulations, you are logged in!</p>
            <form action="/logout" method="POST">
                @csrf
                <button>Logout</button>
            </form>
            <div class="text-indigo-500"
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
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <h2>Register</h2>
                <form action="/register" method="post" class="space-y-6">
                    @csrf
                    <div>
                        <div>
                            <label for="name" class="block font-medium text-gray-900 text-sm/6">User name</label>
                            <div class="mt-2">
                                <input name="name" type="text" placeholder="name"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block font-medium text-gray-900 text-sm/6">Email</label>
                            <div>
                                <input name="email" type="text" placeholder="email"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>
                        <input name="password" type="password" placeholder="password"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <div>
                            <button
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <h2>Login</h2>
                <form class="space-y-6" action="/login" method="post">
                    @csrf
                    <div>
                        <label for="email" class="block font-medium text-gray-900 text-sm/6">User name</label>
                        <div class="mt-2">
                            <input name="loginname" type="text" placeholder="name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        <div class="mt-6">
                            <div>
                                <label for="password" class="block font-medium text-gray-900 text-sm/6">Password</label>
                            </div>
                            <div class="mt-2">
                                <input name="loginpassword" type="password" placeholder="password"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>
                        <div>
                            <button
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log
                                in</button>
                        </div>
                    </div>
                </form>
            </div>
        @endauth



    </div>
</body>

</html>
