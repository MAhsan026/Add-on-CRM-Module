<!DOCTYPE html>
<html lang="en">

<head>
    {{-- link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    @yield('css')
</head>

<body>
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-10 w-auto" src="https://www.svgrepo.com/show/301692/login.svg" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                Create a new account
            </h2>
            <p class="mt-2 text-center text-sm leading-5 text-gray-500 max-w">
                Or
                <a href="{{ route('sigin') }}"
                    class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    login to your account
                </a>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            @if (session('success'))
            <div class="p-4 mb-4 rounded-md bg-green-400">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="p-4 mb-4 rounded-md bg-red-400">
                {{ session('error') }}
            </div>
            @endif
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium leading-5  text-gray-700">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="name" name="name" placeholder="Enter Name:" type="text" required=""
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                            @error('name')
                            <div class="text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="email" name="email" placeholder="user@example.com" type="email" required=""
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="role" class="block text-sm font-medium leading-5 text-gray-700">Role</label>
                        <div class="mt-1 flex rounded-md shadow-sm">

                            <select name="role" id="role"
                                class=" block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                <option value="#">Select Role</option>
                                @foreach ($role as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                            Password
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password" name="password" type="password" required=""
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                        @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">
                            Confirm Password
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password_confirmation" name="password_confirmation" type="password" required=""
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                        @error('password_confirmation')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                Create account
                            </button>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
