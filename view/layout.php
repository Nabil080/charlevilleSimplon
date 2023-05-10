<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplon.co -
        <?= $title ?>
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    'main' : ['"Roboto"', 'sans-serif'],
                    'title' : ['"Montserrat"', 'sans-serif'],
                },
                colors: {
                    'main':{
                        red:'#BD3124',
                        white:'#EFF1F3',
                        gray: '#4F4F4F',
                        lightred: '#F6DADE',
                        lightgray: '#F2F2F3',
                        green: '#A2EF4D',
                        border: '#BBBBBB',
                    }
                }
            }
        }
    }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <?php require_once 'view/template/_navbar.php'; ?>
    <?= $content ?>
    <?php require_once 'view/template/_footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <?php if (isset($script))
        echo $script; ?>
</body>

</html>