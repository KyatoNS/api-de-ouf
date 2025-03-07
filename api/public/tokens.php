<?php

function createToken($idUser){
    $now = new DateTime();
    $expiration = $now->getTimestamp() + 86400;
    $tokenBeforeEncode = "$idUser.$expiration";
    $token = base64_encode($tokenBeforeEncode);
    return $token;
}

function verifyToken($token){
    try{
        $date = new DateTime();
        $now = $date->getTimestamp();
    
        $tokenDecode = base64_decode($token);
        $tokensplit = explode(".", $tokenDecode);

        if (count($tokensplit) != 2|| is_int($tokensplit[0]) || is_int($tokensplit[1])){
            return False;
        }
        
        $idUser = $tokensplit[0];
        $dateExpiration = $tokensplit[1];
        
        if ($dateExpiration > $now){
            $databaseConnection = getDatabaseConnection();
            $isOnDb = $databaseConnection->prepare("SELECT * FROM users WHERE token=:token AND is_archived = FALSE;");
    
            $isOnDb->execute([
                "token" => $token,
            ]);
        
            $isOnDbReponse = $isOnDb->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($isOnDbReponse)){
                return False;
            }else{
                return True;
            }
        }else{
            return False;
        }
    
    } catch (Exception $exception) {
        return False;
    }
}