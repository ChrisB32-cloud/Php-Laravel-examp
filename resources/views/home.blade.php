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

    {{-- table ui --}}
    <div class="py-16 mb-16">
        <div
            class="flex flex-col justify-center px-6 py-6 mt-10 border rounded-md lg:px-8 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-3xl">
            <h3 class="text-xl">Department Alerts</h3>
            <ul role="list" class="divide-y divide-gray-100">
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>
                            <p
                                class="mt-0.5 whitespace-nowrap rounded-md bg-red-50 px-1.5 py-0.5 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">
                                ! Important</p>
                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-03-17T00:00Z">March 17,
                                    2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Leslie Alexander</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>
                            <p
                                class="mt-0.5 whitespace-nowrap rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/10">
                                Review</p>
                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-05-05T00:00Z">May 5, 2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Leslie Alexander</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>
                            <p
                                class="mt-0.5 whitespace-nowrap rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/10">
                                Review</p>
                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-05-25T00:00Z">May 25, 2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Courtney Henry</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>
                            <p
                                class="mt-0.5 whitespace-nowrap rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-600 ring-1 ring-inset ring-green-500/10">
                                Review</p>
                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-06-07T00:00Z">June 7, 2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Leonard Krasner</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View
                            <span class="sr-only">, iOS app</span></a>
                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>
                            <p
                                class="mt-0.5 whitespace-nowrap rounded-md bg-yellow-50 px-1.5 py-0.5 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">
                                Archived</p>
                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-06-10T00:00Z">June 10,
                                    2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Courtney Henry</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View
                        </a>

                    </div>
                </li>
            </ul>

        </div>
    </div>

    {{-- Table UI varient 2 --}}
    <div class="py-16 mb-16">
        <div
            class="flex flex-col justify-center px-6 py-6 mt-10 border rounded-md lg:px-8 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-3xl">
            <h3 class="text-xl">Department Alerts</h3>
            <ul role="list" class="divide-y divide-gray-100">
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-red-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>

                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-03-17T00:00Z">March 17,
                                    2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Leslie Alexander</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-red-700 ">


                        </div>
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-green-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-05-05T00:00Z">May 5, 2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Leslie Alexander</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-green-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-05-25T00:00Z">May 25, 2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Courtney Henry</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-blue-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-06-07T00:00Z">June 7, 2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Leonard Krasner</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>
                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-blue-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-06-10T00:00Z">June 10,
                                    2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Courtney Henry</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
            </ul>

        </div>
    </div>

    {{-- Table UI varient 2 with vetical scrolling --}}
    <div class="py-16 mb-16">
        <div
            class="flex flex-col justify-center px-6 py-6 mt-10 border rounded-md max-h-96 lg:px-8 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-3xl">
            <h3 class="pb-1 text-xl">Department Alerts</h3>
            <ul role="list" class="overflow-y-scroll divide-y divide-gray-100 max-h-96 ">
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-red-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>

                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-03-17T00:00Z">March 17,
                                    2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Leslie Alexander</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-red-700 ">


                        </div>
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-green-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-05-05T00:00Z">May 5, 2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Leslie Alexander</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-green-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-05-25T00:00Z">May 25, 2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Courtney Henry</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-blue-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-06-07T00:00Z">June 7, 2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Leonard Krasner</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>
                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-blue-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-06-10T00:00Z">June 10,
                                    2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Courtney Henry</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-blue-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-06-10T00:00Z">June 10,
                                    2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Courtney Henry</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-blue-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-06-10T00:00Z">June 10,
                                    2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Courtney Henry</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
                <li class="flex items-center justify-between py-5 gap-x-6">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <div class=" m-auto pr-1 py-0.5 text-xs font-medium text-blue-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                </svg>


                            </div>
                            <p class="font-semibold text-gray-900 text-sm/6">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do...</p>

                        </div>
                        <div class="flex items-center mt-1 text-gray-500 gap-x-2 text-xs/5">
                            <p class="whitespace-nowrap"><time datetime="2023-06-10T00:00Z">June 10,
                                    2023</time>
                            </p>
                            <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Courtney Henry</p>
                        </div>
                    </div>
                    <div class="flex items-center flex-none gap-x-4">
                        <a href="#"
                            class="hidden px-2.5 py-1.5 text-sm font-semibold text-gray-600  ring-gray-300 hover:text-gray-900 sm:block">View
                        </a>

                    </div>
                </li>
            </ul>

        </div>
    </div>

    {{-- Cards prototype --}}

    <div class="py-16 mb-16">
        <div class="py-24 bg-white sm:py-32">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div
                    class="grid max-w-2xl grid-cols-1 gap-8 mx-auto mt-16 auto-rows-fr sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <article
                        class="relative flex flex-col justify-end px-8 pb-8 overflow-hidden bg-gray-900 isolate rounded-2xl pt-80 sm:pt-48 lg:pt-80">
                        <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                            alt="" class="absolute inset-0 object-cover -z-10 size-full">
                        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

                        <div class="h-32"> <!-- Fixed height container for title -->
                            <h3 class="mb-4 font-semibold text-white text-lg/6">
                                Visit Us
                            </h3>
                            <p class="text-white">Discover what Montgomery County has to explore. Check out our local
                                attractions and plan your stay
                            </p>
                        </div>
                        <a href="#" class="inline-flex items-center mt-3 text-white gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            Find info here
                        </a>
                    </article>
                    <article
                        class="relative flex flex-col justify-end px-8 pb-8 overflow-hidden bg-gray-900 isolate rounded-2xl pt-80 sm:pt-48 lg:pt-80">
                        <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                            alt="" class="absolute inset-0 object-cover -z-10 size-full">
                        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

                        <div class="h-32"> <!-- Fixed height container for title -->
                            <h3 class="mb-4 font-semibold text-white text-lg/6">
                                County News
                            </h3>
                            <p class="text-white">Found out more with county news</p>
                        </div>
                    </article>
                    <article
                        class="relative flex flex-col justify-end px-8 pb-8 overflow-hidden bg-gray-900 isolate rounded-2xl pt-80 sm:pt-48 lg:pt-80">
                        <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                            alt="" class="absolute inset-0 object-cover -z-10 size-full">
                        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

                        <div class="h-32"> <!-- Fixed height container for title -->
                            <h3 class="mb-4 font-semibold text-white text-lg/6">
                                Join our team
                            </h3>
                            <p class="text-white">Apply here for jobs with Montgomery County</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    {{-- Cards less rounded varient --}}
    <div class="py-16 mb-16">
        <div class="py-24 bg-white sm:py-32">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div
                    class="grid max-w-2xl grid-cols-1 gap-8 mx-auto mt-16 auto-rows-fr sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <article
                        class="relative flex flex-col justify-end px-8 pb-8 overflow-hidden bg-gray-900 rounded-lg isolate pt-80 sm:pt-48 lg:pt-80">
                        <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                            alt="" class="absolute inset-0 object-cover -z-10 size-full">
                        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

                        <div class="h-32"> <!-- Fixed height container for title -->
                            <h3 class="mb-4 font-semibold text-white text-lg/6">
                                Visit Us
                            </h3>
                            <p class="text-white">Discover what Montgomery County has to explore. Check out our local
                                attractions and plan your stay
                            </p>
                        </div>
                        <a href="#" class="inline-flex items-center mt-3 text-white gap-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            Find info here
                        </a>
                    </article>
                    <article
                        class="relative flex flex-col justify-end px-8 pb-8 overflow-hidden bg-gray-900 rounded-lg isolate pt-80 sm:pt-48 lg:pt-80">
                        <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                            alt="" class="absolute inset-0 object-cover -z-10 size-full">
                        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

                        <div class="h-32"> <!-- Fixed height container for title -->
                            <h3 class="mb-4 font-semibold text-white text-lg/6">
                                County News
                            </h3>
                            <p class="text-white">Found out more with county news</p>
                        </div>
                    </article>
                    <article
                        class="relative flex flex-col justify-end px-8 pb-8 overflow-hidden bg-gray-900 rounded-lg isolate pt-80 sm:pt-48 lg:pt-80">
                        <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                            alt="" class="absolute inset-0 object-cover -z-10 size-full">
                        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

                        <div class="h-32"> <!-- Fixed height container for title -->
                            <h3 class="mb-4 font-semibold text-white text-lg/6">
                                Join our team
                            </h3>
                            <p class="text-white">Apply here for jobs with Montgomery County</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>


    {{-- Alternate Recent news design --}}
    <div>
        <div class="py-24 bg-white sm:py-32">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div
                    class="grid max-w-2xl grid-cols-1 mx-auto mt-16 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <article class="flex flex-col items-start justify-between">
                        <div class="relative w-full">
                            <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                                alt=""
                                class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                        </div>
                        <div class="max-w-xl">
                            <div class="flex items-center mt-8 text-xs gap-x-4">
                                <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                            </div>
                            <div class="relative group">
                                <h3 class="mt-3 font-semibold text-gray-900 text-lg/6 group-hover:text-gray-600">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        Boost your conversion rate
                                    </a>
                                </h3>
                                <p class="mt-5 text-gray-600 line-clamp-3 text-sm/6">Illo sint voluptas. Error
                                    voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo
                                    necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel.
                                    Iusto corrupti dicta.</p>
                            </div>
                        </div>
                    </article>
                    <article class="flex flex-col items-start justify-between">
                        <div class="relative w-full">
                            <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                                alt=""
                                class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                        </div>
                        <div class="max-w-xl">
                            <div class="flex items-center mt-8 text-xs gap-x-4">
                                <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                            </div>
                            <div class="relative group">
                                <h3 class="mt-3 font-semibold text-gray-900 text-lg/6 group-hover:text-gray-600">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        Boost your conversion rate
                                    </a>
                                </h3>
                                <p class="mt-5 text-gray-600 line-clamp-3 text-sm/6">Illo sint voluptas. Error
                                    voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo
                                    necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel.
                                    Iusto corrupti dicta.</p>
                            </div>
                        </div>
                    </article>
                    <article class="flex flex-col items-start justify-between">
                        <div class="relative w-full">
                            <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80"
                                alt=""
                                class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                        </div>
                        <div class="max-w-xl">
                            <div class="flex items-center mt-8 text-xs gap-x-4">
                                <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                            </div>
                            <div class="relative group">
                                <h3 class="mt-3 font-semibold text-gray-900 text-lg/6 group-hover:text-gray-600">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        Boost your conversion rate
                                    </a>
                                </h3>
                                <p class="mt-5 text-gray-600 line-clamp-3 text-sm/6">Illo sint voluptas. Error
                                    voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo
                                    necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel.
                                    Iusto corrupti dicta.</p>
                            </div>
                        </div>
                    </article>

                    <!-- More posts... -->
                </div>
            </div>
        </div>
    </div>

    {{-- Footer options --}}

    <div class="py-16 mb-16">
        <footer class="bg-gray-900">
            <div class="px-6 py-16 mx-auto max-w-7xl sm:py-24 lg:px-8 lg:py-32">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <img class="h-9" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Company name">
                    <div class="grid grid-cols-2 gap-8 mt-16 xl:col-span-2 xl:mt-0">
                        <div class="md:grid md:grid-cols-2 md:gap-8">

                            <div class="mt-10 md:mt-0">
                                <h3 class="font-semibold text-white text-sm/6">Services</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Vehicle
                                            Registration</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Health
                                            Department</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Waste
                                            Management</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Property
                                            Assessment</a>
                                    </li>

                                </ul>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white text-sm/6">Community</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">About</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Blog</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Jobs</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Press</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-8">

                            <div class="mt-10 md:mt-0">
                                <h3 class="font-semibold text-white text-sm/6">Legal</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Terms of
                                            service</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Privacy
                                            policy</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">License</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white text-sm/6">Employee Resources</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Employee
                                            Portal</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">365 Email
                                            Access</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">It
                                            Helpdesk</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Maint.
                                            Request</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">HR
                                            Helpdesk</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Web
                                            Administration</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Court
                                            Security Access</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {{-- Footer options with varient 2 --}}

    <footer class="bg-gray-900">
        <div class="px-6 pt-16 pb-8 mx-auto max-w-7xl sm:pt-24 lg:px-8 lg:pt-32">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <img class="h-9" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Company name">
                <div class="grid grid-cols-2 gap-8 mt-16 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="font-semibold text-white text-sm/6">Services</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Vehicle
                                        Registration</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Health
                                        Department</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Waste
                                        Management</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Property
                                        Assessment</a>
                                </li>

                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="font-semibold text-white text-sm/6">Community</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">About</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Blog</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Jobs</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Press</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="font-semibold text-white text-sm/6">Employee Resources</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Employee
                                        Portal</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">365 Email
                                        Access</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">It
                                        Helpdesk</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Maint.
                                        Request</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">HR
                                        Helpdesk</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Web
                                        Administration</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Court
                                        Security Access</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="font-semibold text-white text-sm/6">Legal</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Terms of
                                        service</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">Privacy
                                        policy</a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 text-sm/6 hover:text-white">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="pt-8 mt-16 border-t border-white/10 sm:mt-20 lg:mt-24 lg:flex lg:items-center lg:justify-between">
                <div>
                    <h3 class="font-semibold text-white text-sm/6">Subscribe to our newsletter</h3>
                    <p class="mt-2 text-gray-300 text-sm/6">The latest news, articles, and resources, sent to your
                        inbox weekly.</p>
                </div>
                <form class="mt-6 sm:flex sm:max-w-md lg:mt-0">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input type="email" name="email-address" id="email-address" autocomplete="email" required
                        class="w-full min-w-0 rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:w-56 sm:text-sm/6"
                        placeholder="Enter your email">
                    <div class="mt-4 sm:ml-4 sm:mt-0 sm:shrink-0">
                        <button type="submit"
                            class="flex items-center justify-center w-full px-3 py-2 text-sm font-semibold text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Subscribe</button>
                    </div>
                </form>
            </div>
            <div class="pt-8 mt-8 border-t border-white/10 md:flex md:items-center md:justify-between">
                <div class="flex gap-x-6 md:order-2">
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">Facebook</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">Instagram</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">X</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">GitHub</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">YouTube</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <p class="mt-8 text-gray-400 text-sm/6 md:order-1 md:mt-0">&copy; 2025 Montgomery County Government,
                    TN.
                </p>
            </div>
        </div>
    </footer>

    {{-- Footer varient 3 --}}
    <div class="pt-16 ">
        <footer class="bg-gray-900">
            <div class="px-6 py-20 mx-auto overflow-hidden max-w-7xl sm:py-24 lg:px-8">
                <nav class="flex flex-wrap justify-center -mb-6 gap-x-12 gap-y-3 text-sm/6" aria-label="Footer">
                    <a href="#" class="text-gray-400 hover:text-white">Services</a>
                    <a href="#" class="text-gray-400 hover:text-white">Jobs</a>
                    <a href="#" class="text-gray-400 hover:text-white">Community</a>
                    <a href="#" class="text-gray-400 hover:text-white">Employee Resources</a>
                    <a href="#" class="text-gray-400 hover:text-white">Legal</a>
                </nav>
                <div class="flex justify-center mt-16 gap-x-10">
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">Facebook</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">Instagram</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">X</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">GitHub</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <span class="sr-only">YouTube</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <p class="mt-10 text-center text-gray-400 text-sm/6">&copy; 2025 Montgomery County Government, TN.</p>
            </div>
        </footer>

    </div>
</body>

</html>
