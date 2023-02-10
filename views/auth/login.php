<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php css("app.css") ?>
</head>

<body class="bg-gray-300">
    <div class="w-full h-screen flex justify-center items-center">
        <div class="bg-slate-700 w-400 rounded-xl shadow-lg p-6 flex items-center">
            <form method="post" action="/login" class="w-full">
                <div>
                    <label for="email" class="text-white mb-2 block">Addresse email</label>
                    <input type="email" name="email" id="email" class="w-full p-2 rounded-sm">
                </div>
                <div class="my-2">
                    <label for="password" class="text-white mb-2 block">Mot de passe</label>
                    <input type="password" name="password" id="password" class="w-full p-2 rounded-sm">
                </div>
                <button type="submit" class="hover:bg-blue-700 bg-blue-500 text-white p-2 w-full rounded-sm uppercase">Se connecter</button>
                <p class="text-blue-500 text-center mt-4 hover:text-blue-700"><a href="">vous n'avez pas de compte ?</a></p>
            </form>
        </div>
    </div>
</body>

</html>