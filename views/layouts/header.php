<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <?php 
    css("all.min.css");
    css("app.css");
    js("app.js"); 
    ?>
</head>

<body class="bg-gray-300">
    <header class="bg-slate-900 text-gray-100 fixed left-0 right-0 top-0 z-50">
        <div class="container mx-auto md:px-10 py-2 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <h3 class="font-bold text-3xl">LOGO</h3>
                <form action="" method="get" class="bg-white flex items-center rounded text-slate-900 overflow-hidden">
                    <input type="search" name="q" class="outline-none border-none bg-transparent pl-4 py-2" />
                    <button type="submit" class="px-4 rotate-90">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="flex items-center justify-center">
                <nav>
                    <ul class="flex items-center">
                        <li class="px-2 text-white hover:text-white transition">
                            <a href="" class="flex items-center justify-center gap-4">
                                <i class="fa fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="px-2 text-gray-300 hover:text-white transition">
                            <a href="" class="flex items-center justify-center gap-4">
                                <i class="fa fa-envelope"></i>
                                <span>Messages</span>
                            </a>
                        </li>
                        <li class="px-2 text-gray-300 hover:text-white transition">
                            <a href="" class="flex items-center justify-center gap-4">
                                <i class="fa fa-bell"></i>
                                <span>Notifications</span>
                            </a>
                        </li>
                        <li class="px-2 text-gray-300 hover:text-white transition">
                            <a href="" class="flex items-center justify-center gap-4">
                                <i class="fa fa-users"></i>
                                <span>Profiles</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <button type="button" class="bg-blue-800 h-12 w-12 rounded-full flex items-center justify-center ml-6">
                    <p class="font-bold">Z</p>
                </button>
            </div>
        </div>
    </header>