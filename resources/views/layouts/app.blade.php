<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>

    <style>
        [x-cloak] { 
            display: none !important; 
        }
        </style>
        
        <div 
            x-data="{ 
                open: false,
                action: '',
                title: '',
                message: ''
            }"
            @open-modal.window="
                open = true;
                action = $event.detail.action;
                title = $event.detail.title;
                message = $event.detail.message;
            "
        >
            <!-- Modal Backdrop -->
            <div
                x-show="open"
                x-cloak
                x-transition.opacity
                class="fixed inset-0 flex items-center justify-center z-50"
            >
                <div class="bg-black opacity-50 absolute inset-0"></div>
                
                <!-- Modal Content -->
                <div 
                    class="bg-white rounded-lg shadow-lg w-96 p-6 z-10"
                    @click.outside="open = false"
                >
                    <h3 class="text-xl font-bold text-gray-800" x-text="title"></h3>
                    <p class="text-gray-600 mt-2" x-text="message"></p>
                    
                    <div class="mt-4 flex justify-end space-x-4">
                        <button 
                            @click="open = false"
                            class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-md"
                        >
                            Batal
                        </button>
                        
                        <form :action="action" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md"
                            >
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        function openModal(action, title, message) {
            window.dispatchEvent(new CustomEvent('open-modal', {
                detail: { action, title, message }
            }));
        }
        </script>

    @auth
        @if(auth()->user()->role === 'admin')
            @include('layouts.partials.nav_admin')
        @elseif(auth()->user()->role === 'sales')
            @include('layouts.partials.nav_sales')
        @endif
    @endauth

    <div class="flex-1 ml-64">
        @yield('content')
    </div>
</body>
</html>
