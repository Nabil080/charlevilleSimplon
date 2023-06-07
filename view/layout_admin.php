<!DOCTYPE html>
<html class="w-[100vw] overflow-x-hidden">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplon.co -
        <?= $title ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="build/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
    <script>
    tailwind.config = {
        theme: {
            fontFamily: {
                sans: 'Roboto',
                title: 'Montserrat',
            },
            extend: {
                colors: {
                    'main': {
                        red: '#BD3124',
                        white: '#FFFF',
                        gray: '#4F4F4F',
                        lightred: '#F6DADE',
                        lightgray: '#F2F2F3',
                        blue: '#4A9AE6',
                        green: '#A2EF4D',
                    }
                }
            }
        }
    }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link href="assets/css/nav.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <?php if (isset($link))
        echo $link; ?>
</head>

<body class="w-[100vw] bg-main-white pt-20 pb">

    <?php require_once 'view/template/_navbar.php'; ?>
    <?php require_once 'view/template/_navbarAdmin.php'; ?>

    <main class="md:ml-64">
        <?php include("view/template/_searchCrud.php"); ?>
        <div class="overflow-x-auto xl:overflow-x-visible">
            <?= $content ?>
            <?php include("view/template/_paginationCrud.php"); ?>
        </div>
    </main>

    <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
    <script src="assets/js/function.js"></script>
    <script src="assets/js/crud.js"></script>
    <script src="assets/js/crudNabil.js"></script>
    <!-- <script src="assets/js/ajax_form.js"></script> -->
    <?php if (isset($script))
        echo $script; ?>
</body>

</html>