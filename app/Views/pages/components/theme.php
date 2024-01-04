<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="shortcut icon" href="<?= asset('favicon.png') ?>" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?= asset("css/google-icons.css") ?>">
        <link rel="stylesheet" href="<?= asset("css/bootstrap.min.css") ?>">
        <link rel="stylesheet" href="<?= asset("css/style.css") ?>">
        <!--<script src="//code.jivosite.com/widget/yMCW4wGa9c" async></script>-->
    </head>
    <body class="bg-general text-white">

        <div class="message-component alert alert-<?= $class ?> fw-bold">
            <span class="text-<?= $class ?>"><?= $message ?></span>
        </div>

        <nav class="sidebar-app">
            <?php $this->insert("components/sidebar") ?>
        </nav>

        <main class="pt-5">
            <?= $this->section("content") ?>
        </main>
        
        <script src="<?= asset('js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= asset('js/hideMsg.js') ?>"></script>
        <?= $this->section("scripts") ?>
    </body>
</html>