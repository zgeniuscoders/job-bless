<?php views("./layouts/header.php") ?>
<div class="container mx-auto md:px-10 px-5 top-24 grid md:grid-cols-custom-2 gap-4 relative">
    <aside class="hidden md:block sticky h-max top-24">
        <?php views("./widgets/profile.php") ?>
        <?php views("./widgets/suggestions.php") ?>
    </aside>
    <main>
        <?php views("./widgets/top-job.php") ?>
        <div class="mt-4">
            <?php views("./widgets/post.php") ?>
        </div>
    </main>
</div>
<?php views("./layouts/footer.php") ?>