<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('../resources/css/app.css')
</head>

<body>
    <div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">


        @auth
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="w-auto h-10 mx-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company">
                <h2 class="mt-10 font-bold tracking-tight text-center text-gray-900 text-2xl/9">Congratulations, you are
                    logged in!</h2>

                <form action="/logout" method="POST" class="space-y-6">
                    @csrf
                    <button
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Logout</button>
                </form>
                <div class="p-2 text-indigo-500">
                    <h2>Create a new post</h2>
                    <form action="/create-post" method="post" class="space-y-6">
                        @csrf
                        <div>
                            <label for="title" class="block font-medium text-gray-900 text-sm/6">Title</label>
                            <div class="mt-2">
                                <input name="title" type="text" placeholder="title"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>
                        <div>
                            <label for="post" class="block font-medium text-gray-900 text-sm/6">Post</label>
                            <div class="mt-2">
                                <textarea name="body" rows="3" placeholder="content"
                                    class="block w-full border border-y-inherit rounded-md resize-none bg-transparent outline-gray-300 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"></textarea>
                            </div>
                        </div>
                        <div>
                            <button
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save
                                post</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="py-24 bg-white sm:py-32">
                <div class="px-6 mx-auto max-w-7xl lg:px-8">
                    <div class="max-w-2xl mx-auto">
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Post</h2>
                        <div class="pt-10 mt-10 space-y-16 border-t border-gray-200 sm:mt-16 sm:pt-16">
                            <article class="flex flex-col items-start justify-between max-w-xl">
                                @foreach ($posts as $post)
                                    <div class="relative group">
                                        <h3 class="mt-3 font-semibold text-gray-900 text-lg/6 group-hover:text-gray-600">
                                            {{ $post->title }}</h3>
                                        <p class="mt-5 text-gray-600 line-clamp-3 text-sm/6">{{ $post->body }}</p>
                                        {{-- <form action="/delete-post/{{ $post->id }}" method="post">
                        @csrf
                        <button>Delete post</button>
                    </form> --}}
                                    </div>
                                @endforeach
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="w-auto h-10 mx-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company">
                <h2 class="mt-10 font-bold tracking-tight text-center text-gray-900 text-2xl/9">Sign in to your account</h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <h2>Register</h2>
                <form action="/register" method="post" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block font-medium text-gray-900 text-sm/6">User name</label>
                        <div class="mt-2">
                            <input name="name" type="text" placeholder="name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block font-medium text-gray-900 text-sm/6">Email</label>
                        <div class="mt-2">
                            <input name="email" type="text" placeholder="email"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block font-medium text-gray-900 text-sm/6">Password</label>
                        <div class="mt-2">
                            <input name="password" type="password" placeholder="password"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <button
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                    </div>
                </form>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <h2>Login</h2>
                <form class="space-y-6" action="/login" method="post">
                    @csrf
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
                </form>
            </div>
        @endauth



    </div>
</body>

</html>
