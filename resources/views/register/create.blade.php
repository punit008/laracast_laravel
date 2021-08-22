<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="bloxk mb-2 uppercase font-bold text-xs text-gray-700">
                        name
                    </label>
                    <input  type="text" 
                            class="border border-gray-400 p-2 w-full" 
                            name="name"
                            value="{{ old('name') }}"
                            required
                    >

                    @error('name')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="username" class="bloxk mb-2 uppercase font-bold text-xs text-gray-700">
                        username
                    </label>
                    <input  type="text" 
                            class="border border-gray-400 p-2 w-full" 
                            name="username"
                            value="{{ old('username') }}" 
                            required
                    >

                    @error('username')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="bloxk mb-2 uppercase font-bold text-xs text-gray-700">
                        email
                    </label>
                    <input  type="email" 
                            class="border border-gray-400 p-2 w-full" 
                            name="email"
                            value="{{ old('email') }}"
                            required
                    >

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="bloxk mb-2 uppercase font-bold text-xs text-gray-700">
                        password
                    </label>
                    <input  type="password" 
                            class="border border-gray-400 p-2 w-full" 
                            name="password"
                            required
                    >

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>