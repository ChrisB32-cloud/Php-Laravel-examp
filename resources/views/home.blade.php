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
</body>

</html>
