<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Nice extends Db
{
    private $table = 'nice';

    public function __construct($dbh = null)
    {  
       parent::__construct($dbh); 
    }

    public function allNice()
    {
        $sql = 'SELECT * FROM '.$this->table;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public function insertNice($post_id,$user_id)
    {
        $sql = 'INSERT INTO nice( 
            post_id,user_id) 
        values(
            :post_id,:user_id)';
        $sth = $this->dbh->prepare($sql);
        $param = [':post_id'=>$post_id,':user_id'=>$user_id];
        $sth->execute($param);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function niceFlgOn($post_id,$user_id)
    {
        $sql = 'UPDATE nice SET 
                flg = 1 
                 WHERE post_id = :post_id and user_id = :user_id';
        $sth = $this->dbh->prepare($sql);
        $param = [':post_id'=>$post_id,':user_id'=>$user_id];
        $sth->execute($param);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function niceFlgOff($post_id,$user_id)
    {
        $sql = 'UPDATE nice SET 
                flg = 0  
                 WHERE post_id = :post_id and user_id = :user_id';
        $sth = $this->dbh->prepare($sql);
        $param = [':post_id'=>$post_id,':user_id'=>$user_id];
        $sth->execute($param);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function selectNiceCount($post_id)
    {
        $sql = 'SELECT * FROM nice 
                 WHERE post_id = :post_id and flg = 0';
        $sth = $this->dbh->prepare($sql);
        $param = [':post_id'=>$post_id];
        $sth->execute($param);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($userId,$postId)
    {
        $sql = 'SELECT * FROM '.$this->table.' WHERE user_id = :user_id AND post_id = :post_id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$userId);
        $sth->bindValue(':post_id',$postId);
        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_ASSOC);

        if(!$result)
        {
            $sql = 'INSERT INTO '.$this->table.' (post_id,user_id) VALUE (:post_id,:user_id)';
            $sth = $this->dbh->prepare($sql);
            $sth->bindValue(':user_id',$userId);
            $sth->bindValue(':post_id',$postId);
            $sth->execute();
        }
        else
        {
            echo "update";
            $flg = $result['flg'];
            if($flg)
            {
                $flg = 0;
            }
            else
            {
                $flg = 1;
            }
            $sql = 'UPDATE '.$this->table.' SET flg=:flg WHERE user_id=:user_id';
            $sth = $this->dbh->prepare($sql);
            $sth->bindValue(':flg',$flg);
            $sth->bindValue(':user_id',$userId);
            $sth->execute();
        }
    }
}
?>