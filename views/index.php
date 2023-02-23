<?php $render->view("layouts.header") ?>
<div class="container mx-auto md:px-10 top-24 grid md:grid-cols-custom gap-4 relative">
    <aside class="hidden md:block sticky h-max top-24">
        <?php $render->view("widgets/profile") ?>
        <?php $render->view("widgets/suggestions") ?>
    </aside>
    <div>
        <?php $render->view("widgets/create-post") ?>
        <main class="mt-4">
            <?php $render->view("widgets/post") ?>
            <?php $render->view("widgets/top-profiles") ?>
        </main>
    </div>
    <!-- website info -->
    <div class="hidden md:block">
        <div class="bg-white shadow rounded-tr rounded-tl mb-2">

            <div class="p-8 text-center flex items-center justify-center flex-col">
                <div class="bg-slate-900 h-20 w-20 flex items-center justify-center text-center rounded-full">
                    <p class="text-gray-100 font-bold text-xl">ZG</p>
                </div>
                <h3 class="font-extrabold mt-4">ZGENIUS CODERS</h3>
                <p class="text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            <div class="border-t text-center p-4">
                <a href="" class="capitalize text-blue-500">read more</a>
            </div>

        </div>
        <?php $render->view("widgets/top-job") ?>
        <?php $render->view("widgets/projets") ?>
    </div>
</div>
<?php $render->view("layouts/footer") ?>