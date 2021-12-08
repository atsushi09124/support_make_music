<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Users extends Db
{
    private $table = 'users';

    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
    }

    public function findById($id = 0)
    {
        $sql = 'SELECT * FROM '.$this->table.' WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id' , $id);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function createAcount($name,$email,$password,$history,$guiter,$artist1,$artist2,$artist3,$music1,$music2,$music3)
    {
        //$hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users(
                name,email,password,history,guiter,artist1,artist2,artist3,music1,music2,music3) 
                values(
                :name,:email,:password,:history,:guiter,:artist1,:artist2,:artist3,:music1,:music2,:music3)';
        $sth = $this->dbh->prepare($sql);
        $param = [':name'=>$name,':email'=>$email,':password'=>$password,':history'=>$history,
                  ':guiter'=>$guiter,':artist1'=>$artist1,':artist2'=>$artist2,':artist3'=>$artist3,
                  ':music1'=>$music1,':music2'=>$music2,'music3'=>$music3];
        //$sth->bindParam(':newPassword', $hash);
        $sth->execute($param);
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function editAcount($id,$name,$email,$password,$history,$guiter,$artist1,$artist2,$artist3,$music1,$music2,$music3)
    {
        //$hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = 'UPDATE users SET 
                name = :name,
                email = :email,
                password = :password,
                history = :history,
                guiter = :guiter,
                artist1 = :artist1,
                artist2 = :artist2,
                artist3 = :artist3,
                music1 = :music1,
                music2 = :music2,
                music3 = :music3 
            WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $param = [':id'=>$id,':name'=>$name,':email'=>$email,':password'=>$password,':history'=>$history,
                  ':guiter'=>$guiter,':artist1'=>$artist1,':artist2'=>$artist2,':artist3'=>$artist3,
                  ':music1'=>$music1,':music2'=>$music2,'music3'=>$music3];
        //$sth->bindParam(':newPassword', $hash);
        $sth->execute($param);
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    public function getUsers():Array
    {
        $sql = 'SELECT * FROM '.$this->table;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function pointFindUser($id)
    {
        $sql = 'SELECT * FROM '.$this->table;
        $sql .= ' WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id' , $id);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


}


?>