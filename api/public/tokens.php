<?php

function createToken($idUser){
    $now = new DateTime();
    $expiration = $now->getTimestamp() + 86400;
    $tokenBeforeEncode = "$idUser.$expiration";
    $token = base64_encode($tokenBeforeEncode);
    return $token;
}

function verifyExpirationToken($token){
    $now = new DateTime();
    
    $tokenDecode = base64_decode($token);
    $tokensplit = explode(".", $tokenDecode);
    echo($tokenDecode);
    
    $idUser = $tokensplit[0];
    $dateExpiration = $tokensplit[1];
    
    if ($dateExpiration < $now){
        return True;
    }else{
        return False;
    }

    $isOnDb = $databaseConnection->prepare("SELECT * FROM users WHERE token=:token AND is_archived = FALSE;");

    $isOnDb->execute([
        "token" => htmlspecialchars($token),
    ]);

    $isOnDbReponse = $isOnDb->fetchAll(PDO::FETCH_ASSOC);

    if (empty($isOnDbReponse)){
        return True;
    }else{
        return False;
    }
}