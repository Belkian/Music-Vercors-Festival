<?php
final class Database_reservation
{
    private $_DB;
    public function __construct()
    {
        $this->_DB = __DIR__ . "/../csv/reservation.csv";
    }
    public function save_reservation(Reservation $Reservation): bool
    {
        $fichier = fopen($this->_DB, "ab");
        $retour = fputcsv($fichier, $Reservation->getObject_Recap());
        fclose($fichier);
        return $retour;
    }
    public function Toute_Les_Reservations(): array
    {
        $fichier = fopen($this->_DB, "r");
        $Reservations = [];

        while (($ligne = fgetcsv($fichier, 1000, ",")) !== false) {
            $Reservations[] = new User($ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[0]);
        }
        fclose($fichier);
        return $Reservations;
    }

    public function findUserByEmail(string $email): User|bool
    {
        $fichier = fopen($this->_DB, "r");
        while (($user = fgetcsv($fichier, 1000, ",")) !== false) {
            if ($user[3] === $email) {
                $user = new User($user[1], $user[2], $user[3], $user[4], $user[0], $user[5]);
                break;
            } else {
                $user = false;
            }
        }
        fclose($fichier);
        return $user;
    }



    // public function findUserById(int $id): User|bool
    // {
    //     $fichier = fopen($this->_DB, "r");
    //     while (($user = fgetcsv($fichier, 500, ",")) !== false) {
    //         if ($user[0] === $id) {
    //             $user = new User($user[1], $user[2], $user[3], $user[4], $user[0], $user[5]);
    //             break;
    //         } else {
    //             $user = false;
    //         }
    //     }
    //     fclose($fichier);
    //     return $user;
    // }
}
