<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplon.co -
        <?= $title ?>
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'main':{
                        '#da373d',
                        gray: '#4F4F4F',
                        lightred: '#F6DADE',
                        lightgray: '#F2F2F3',
                        }
                }
            }
        }
    }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="text">   </div>
    <?php require_once 'view/template/_navbar.php'; ?>
    <?= $content ?>
    <?php require_once 'view/template/_footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <?php if (isset($script))
        echo $script; ?>
</body>

</html>