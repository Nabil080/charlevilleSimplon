<?php 

function securizeString(string $string = null)
{

    if(!isset($string) OR empty($string) OR strlen($string) < 3){
        if(strlen($string) < 3){
            $response = array(
                "status" => "failure",
                "message" => "Un champ est trop court"
            );
            echo json_encode($response);
        }else{

            $response = array(
                "status" => "failure",
                "message" => "Un champ est invalide"
            );

            echo json_encode($response);
        }
        return false;
    }else{
        $safe_string = filter_var(trim($string), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return $safe_string;
    }
}

function securizeUrl(string $string = null)
{

    $pattern = '/^https?:\\/\\/(?:www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/';

    if(!preg_match($pattern, $string) OR !isset($string) OR empty($string) OR strlen($string) < 3){
        if(strlen($string) < 3){
            $response = array(
                "status" => "failure",
                "message" => "Un champ est trop court"
            );
            echo json_encode($response);
        }elseif(!isset($string) OR empty($string)){

            $response = array(
                "status" => "failure",
                "message" => "Un champ est invalide"
            );

            echo json_encode($response);
        }elseif(!preg_match($pattern, $string)){

            $response = array(
                "status" => "failure",
                "message" => "Merci de rentrer une URL."
            );

            echo json_encode($response);
        }
        return false;
    }else{
        $safe_string = filter_var(trim($string), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return $safe_string;
    }
}



function securizeMail(string $mail = null)
{
    if(!isset($mail) OR empty($mail) OR !filter_var($mail, FILTER_VALIDATE_EMAIL)){

        $response = array(
            "status" => "failure",
            "message" => "Email invalide"
        );
        echo json_encode($response);
        return false;
    }else{
        $safe_mail = filter_var(trim($mail), FILTER_SANITIZE_EMAIL);

        return $safe_mail;
    }
}

function securizeInteger(string|int $int = null)
{
    if(!isset($int) OR empty($int) OR is_numeric($int) === false){

        $response = array(
            "status" => "failure",
            "message" => "Nombre invalide"
        );
        echo json_encode($response);
        return false;
    }else{

        return (int)$int;
    }
}

function securizePhone(string $phone = null)
{
    $pattern = '/^[0-9]{10}+$/';

    if(isset($phone) AND preg_match($pattern, $phone)){

        return $phone;
    }else{
        $response = array(
            "status" => "failure",
            "message" => "Numéro de téléphone invalide"
        );
        echo json_encode($response);

        return false;
    }
}

function securizePassword(string $password, string $confirm_password)
{
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{6,}$/';

    if(isset($password) AND preg_match($pattern, $password) && $confirm_password == $password){
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        return $hashed_password;
    }else{
        if($confirm_password != $password){

            $response = array(
                "status" => "failure",
                "message" => "Les mots de passe ne correspondent pas"
            );
            echo json_encode($response);

            return false;
        }

        if(!preg_match($pattern, $password)){

            $response = array(
                "status" => "failure",
                "message" => "Mot de passe invalide ! Vous devez au minimum employer une majuscule, un chiffre et un caractère spécial."
            );
            echo json_encode($response);

            return false;
        }
    }

}

function securizeImage(array $filesImage, string $path){
    if(!empty($filesImage))
        {
        $nameFile = $filesImage['name'];
        $typeFile = mime_content_type($filesImage['tmp_name']);
        $tmpFile = $filesImage['tmp_name'];
        $errorFile = $filesImage['error'];
        $sizeFile = $filesImage['size'];

        $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jiff'];
        $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/jiff'];

        $extension = explode('.', $nameFile);


        $max_size = 8000000;


        if(in_array($typeFile, $type))
        {
            if(count($extension) <=2 && in_array(strtolower(end($extension)), $extensions))
            {
                if($sizeFile <= $max_size && $errorFile == 0)
                {
                    if(move_uploaded_file($tmpFile, $path.$image = uniqid() . '.' . end($extension)) )
                    {
                        // $response = array(
                        //     "status" => "success",
                        //     "message" => "L'image a bien été upload'"
                        // );
                        // echo json_encode($response);
                        return $path.$image;
                    }
                    else
                    {
                        $response = array(
                            "status" => "failure",
                            "message" => "Echec de l'upload de l'image"
                        );
                        echo json_encode($response);

                        return false;
                    }
                }
                else
                {
                    $response = array(
                        "status" => "failure",
                        "message" => "Le poids de l'image est trop élevé"
                    );
                    echo json_encode($response);

                    return false;
                }
            }
            else
            {
                $response = array(
                    "status" => "failure",
                    "message" => "Merci d'upload une image !"
                );
                echo json_encode($response);

                return false;
            }
        }
        else
        {
            $response = array(
                "status" => "failure",
                "message" => "Type non autorisé !"
            );
            echo json_encode($response);

            return false;
        }
    }else{

        $response = array(
            "status" => "failure",
            "message" => "Le fichier est vide !"
        );
        echo json_encode($response);

        return false;
    }
}

function securizePdf(array $filesPdf, string $path)
{
    if(!empty($filesPdf)) {
        $nameFile = $filesPdf['name'];
        $typeFile = mime_content_type($filesPdf['tmp_name']);
        $tmpFile = $filesPdf['tmp_name'];
        $errorFile = $filesPdf['error'];
        $sizeFile = $filesPdf['size'];

        $extensions = ['pdf'];
        $type = ['application/pdf'];

        $extension = explode('.', $nameFile);


        $max_size = 8000000;


        if(in_array($typeFile, $type)) {
            if(count($extension) <=2 && in_array(strtolower(end($extension)), $extensions)) {
                if($sizeFile <= $max_size && $errorFile == 0) {
                    if(move_uploaded_file($tmpFile, $path.$pdf = uniqid() . '.' . end($extension))) {
                        // $response = array(
                        //     "status" => "",
                        //     "message" => "Le cahier des charges a bien été envoyé'"
                        // );
                        // echo json_encode($response);
                        return $path.$pdf;
                    } else {
                        $response = array(
                            "status" => "failure",
                            "message" => "Echec de l'envoi du cahier des charges"
                        );
                        echo json_encode($response);

                        return false;
                    }
                } else {
                    $response = array(
                        "status" => "failure",
                        "message" => "Le poids du cahier des charges est trop élevé"
                    );
                    echo json_encode($response);

                    return false;
                }
            } else {
                $response = array(
                    "status" => "failure",
                    "message" => "Merci d'upload un pdf !"
                );
                echo json_encode($response);

                return false;
            }
        } else {
            $response = array(
                "status" => "failure",
                "message" => "Type non autorisé !"
            );
            echo json_encode($response);

            return false;
        }
    } else {

        $response = array(
            "status" => "failure",
            "message" => "Le fichier est vide !"
        );
        echo json_encode($response);

        return false;
    }
}

function securizeText(string $text):bool
{
    $array = ['<script', '<script>', '</script>', '<iframe', '<iframe>', '</iframe>', '<img', '<link', '<link>', 'href',
    'src', 'SELECT', 'DELETE', 'DROP', 'INSERT INTO', '<a', '<a>'];
    $bools = [];
    foreach ($array as $key) {
        if (str_contains($text, $key)) {
            $bool = true;
            array_push($bools, $bool);
        } else if (!str_contains($text, $key)) {
            $bool = false;
            array_push($bools, $bool);
        }
    }

    if (in_array(true, $bools)) {
        $isSafe = false;
        return $isSafe;
    } else if (!in_array(true, $bools)) {
        $isSafe = true;
        return $isSafe;
    }
}

function formateDate($date):string
{
    setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
    $datefmt = new IntlDateFormatter('fr_FR', 0, 0, NULL, NULL, 'dd MMMM yyyy');
    $formatedDate = $datefmt->format(date_create($date));
    return $formatedDate;
}

function getPromoName(string $formation, string $date)
{
    $dateArray = explode("-", $date);
    $year = $dateArray[0];
    $promo = "$formation $year";

    return $promo;
}