
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="pt-10 pb-16 antialiased md:pb-32">
    
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        <header class="flex items-center justify-between space-x-5 text-slate-900">
            
            <a href="<?php echo e(route('index')); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>
            </a>
            
            <form action="<?php echo e(route('index')); ?>" class="flex items-center pb-3 pr-2 transition border-b border-b-slate-300 text-slate-300 focus-within:border-b-slate-900 focus-within:text-slate-900">
                <input id="search" value="<?php echo e(request()->search); ?>" class="w-full px-2 leading-none outline-none placeholder-slate-400" type="search" name="search" placeholder="Rechercher un article">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
            
            <nav x-data="{ open: false }" x-cloak class="relative">
                <button
                    @click="open = !open"
                    @click.outside="if (open) open = false"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'flex w-8 h-8 text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2',

                        ' md:hidden '=>Auth::guest(),
                    ]); ?>"
                >
                <?php if(auth()->guard()->check()): ?>

                <img class="w-8 h-8 rounded-full" src="<?php echo e(Gravatar::get(Auth::user()->email)); ?>" alt="Image de profil">

                <?php else: ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                    </svg>
                <?php endif; ?>
                </button>
                <ul
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"

                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none',
                        'md:hidden'=>Auth::guest(),
                    ]); ?>"
                    tabindex="-1"
                >

                    <?php if(auth()->guard()->check()): ?>

                        <li><a href="<?php echo e(route('home')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mon compte</a></li>
                        <li>
<?php if(Auth::user()->isAdmin()): ?>
                            <li><a href="<?php echo e(route('admin.posts.index')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gestion des postes</a></li>
                            <li>
<?php endif; ?>
                        <li><a href="<?php echo e(route('logout')); ?>" @click.prevent="$refs.logout.submit()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Deconnexion</a></li>
                        <form x-ref="logout" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
                            <?php echo csrf_field(); ?>
                        </form>
                        <li>
                    <?php else: ?>

                    <li><a href="<?php echo e(route('login')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Connexion</a></li>
                    <li>
                        <a href="<?php echo e(route('register')); ?>" class="flex items-center px-4 py-2 text-sm font-semibold text-indigo-700 hover:bg-gray-100">
                            Inscription
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 ml-1">
                                <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php if(auth()->guard()->guest()): ?>
                    <ul class="hidden space-x-12 font-semibold md:flex">
                    <li><a href="<?php echo e(route('login')); ?>">Connexion</a></li>
                    <li>
                        <a href="<?php echo e(route('register')); ?>" class="flex items-center text-indigo-700 group">
                            Inscription
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-1 transition-all group-hover:ml-2 group-hover:mr-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <?php endif; ?>

            </nav>
        </header>

        <?php if(session('status')): ?>
        <div class="p-4 mt-10 rounded-md bg-green-50">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800"><?php echo e(session('status')); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>


        <main class="mt-10 md:mt-12 lg:mt-16">
           <?php echo e($slot); ?>

        </main>
    </div>
</body>
</html>
<?php /**PATH /home/wecode/code/example-app/resources/views/layouts/default.blade.php ENDPATH**/ ?>