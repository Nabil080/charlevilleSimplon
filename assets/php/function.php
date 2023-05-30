<?php 

function securizeString(string $string)
{

    if(!isset($string) OR empty($string) OR strlen($string) < 3){
        if(strlen($string) < 3){
            $response = array(
                "status" => "failure",
                "message" => "Le nom est trop court"
            );
            echo json_encode($response);
        }else{

            $response = array(
                "status" => "failure",
                "message" => "Le nom est invalide"
            );

            echo json_encode($response);
        }
        return false;
    }else{
        $safe_string = filter_var(trim($string), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return $safe_string;
    }
}


function securizeImage(array $filesImage){
    if(!empty($filesImage))
        {
        $path = 'assets/upload/company/';
        $nameFile = $filesImage['name'];
        $typeFile = $filesImage['type'];
        $tmpFile = $filesImage['tmp_name'];
        $errorFile = $filesImage['error'];
        $sizeFile = $filesImage['size'];

        $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jiff'];
        $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/jiff'];

        $extension = explode('.', $nameFile);


        $max_size = 1000000;


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

function securizePdf(array $filesPdf){
    if(!empty($filesPdf))
        {
        $path = 'assets/upload/pdf/';
        $nameFile = $filesPdf['name'];
        $typeFile = $filesPdf['type'];
        $tmpFile = $filesPdf['tmp_name'];
        $errorFile = $filesPdf['error'];
        $sizeFile = $filesPdf['size'];

        $extensions = ['pdf'];
        $type = ['application/pdf'];

        $extension = explode('.', $nameFile);


        $max_size = 1000000;


        if(in_array($typeFile, $type))
        {
            if(count($extension) <=2 && in_array(strtolower(end($extension)), $extensions))
            {
                if($sizeFile <= $max_size && $errorFile == 0)
                {
                    if(move_uploaded_file($tmpFile, $path.$pdf = uniqid() . '.' . end($extension)) )
                    {
                        // $response = array(
                        //     "status" => "",
                        //     "message" => "Le cahier des charges a bien été upload'"
                        // );
                        // echo json_encode($response);
                        return $path.$pdf;
                    }
                    else
                    {
                        $response = array(
                            "status" => "failure",
                            "message" => "Echec de l'upload du cahier des charges"
                        );
                        echo json_encode($response);

                        return false;
                    }
                }
                else
                {
                    $response = array(
                        "status" => "failure",
                        "message" => "Le poids du cahier des charges est trop élevé"
                    );
                    echo json_encode($response);

                    return false;
                }
            }
            else
            {
                $response = array(
                    "status" => "failure",
                    "message" => "Merci d'upload un pdf !"
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