<?php

namespace Module\App;
use Module\App\DataBase;

class JsonDb implements DataBase {
    public function create(array $userData): void{
        $db = json_decode(file_get_contents(DIR.'/data/users.json'), 1);
        $iban = json_decode(file_get_contents(DIR.'/data/iban.json'), 1);
        if(!isset($iban[$userData['idNumber']])){ //if id number does not exist, save new account
            $db[$userData['idNumber']] = [
                'userId' => $iban['nextUserId'],
                'surname' => $userData['surname'],
                'name' => $userData['name'],
                'idNumber' => $userData['idNumber'],
                'psw' => $userData['psw'],
                'accounts' => [
                    [
                        'iban' => ('LT' . ($iban['nextIBAN'])),
                        'balance' => 0
                    ]
                ]
            ];
            // uasort($db, fn($d1, $d2) => (($d1['surname'] ?? 0) <=> ($d2['surname'] ?? 0)));
            $iban['nextIBAN']++;
            $iban['nextUserId']++;
            file_put_contents(DIR.'/data/users.json', json_encode($db));
            file_put_contents(DIR.'/data/iban.json', json_encode($iban));
            $_SESSION['status'] = true;
        } else {    // if user with this id exists, then do not save new account
            $_SESSION['status'] = false;
        }
    }
    
    
    public function update(int $userId, array $userData): void{
        $db = json_decode(file_get_contents(DIR.'/data/users.json'), 1);
        if(isset($userData['changeBalance'])){ //this logic will be used if balance is changed
            $db[$userId]['accounts'][$userData['accountNo']]['balance'] += ('add' == $userData['action']) ?  $userData['amount'] : (0 - $userData['amount']);
        } else { //this logic will be used if user info is changed
            foreach($userData as $index => &$value){
                $db[$userId][$index] = $value;
            }
        }
    }

    public function delete(int $userId): void{
        $db = json_decode(file_get_contents(DIR.'/data/users.json'), 1);
        unset($db[$userId]);
        file_put_contents(DIR.'/data/users.json', json_encode($db));
    }

    public function show(int $userId): array{
        $db = json_decode(file_get_contents(DIR.'/data/users.json'), 1);
        return $db[$userId];
    }
    
    public function showAll(): array{
        return json_decode(file_get_contents(DIR.'/data/users.json'), 1);
    }
}