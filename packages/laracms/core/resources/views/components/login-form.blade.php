<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <div class="flex justify-center"><x-laracms::logo /></div>
            <p class="text-gray-600 mt-2">Sign in to your account</p>
        </div>

        <form wire:submit="login">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Email Address
                </label>
                <input 
                    type="email" 
                    wire:model="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="admin@example.com"
                >
                @error('email') 
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Password
                </label>
                <input 
                    type="password" 
                    wire:model="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="••••••••"
                >
                @error('password') 
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                @enderror
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input 
                        type="checkbox" 
                        wire:model="remember" 
                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                    >
                    <span class="ml-2 text-sm text-gray-700">Remember me</span>
                </label>
            </div>

            <button 
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200"
            >
                Sign In
            </button>
        </form>
    </div>
</div>