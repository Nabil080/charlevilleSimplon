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
                            orange: '#ff7f00',
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


<body class="w-[100vw] bg-main-white min-h-screen pt-12">
    <?php require_once 'view/template/_navbar.php'; ?>
    <?php include 'view/template/_login.php'; ?>
    <div class="pt-[73px]">
        <?php if (isset($_SESSION['alertMessage'])) { ?>
            <div class="z-50 sticky top-0 w-full">
                <?= $_SESSION['alertMessage']; ?>
            </div>
            <?php unset($_SESSION['alertMessage']);
        } ?>
    </div>



    <?= $content ?>


    <?php require_once 'view/template/_footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
    <script src="assets/js/nav.js"></script>
    <script src="assets/js/function.js"></script>
    <script src="assets/js/editor_setup.js"></script>
    <script src="assets/js/ajax_handleFormSubmission.js"></script>
    <script>
        handleFormSubmission('#login-form', 'index.php?action=loginTreatment');
        handleFormSubmission('#forget-form', 'index.php?action=sendMailResetPasswordTreatment');
    </script>
    <?php if (isset($script))
        echo $script; ?>
</body>

</html>