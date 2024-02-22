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
            $Reservations[] = new Reservation($ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7], $ligne[8], $ligne[9], $ligne[1], $ligne[0]);
        }
        fclose($fichier);
        return $Reservations;
    }

    public function find_Reservation_By_Email(string $email): User|bool
    {
        $fichier = fopen($this->_DB, "r");
        while (($user = fgetcsv($fichier, 1000, ",")) !== false) {
            if ($user[1] === $email) {
                $user = new Reservation($user[2], $user[3], $user[4], $user[5], $user[6], $user[7], $user[8], $user[9], $user[1], $user[0]);
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
