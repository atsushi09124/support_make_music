<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Post extends Db
{
    private $table = 'post';

    public function __construct($dbh = null)
    {  
       parent::__construct($dbh); 
    }

    public function createPost($user_id,$name,$main_key,$main_scale,$progress_chord,$in_chord,$A_chord,
                               $B_chord,$main_chord,$C_chord,$out_chord,$body)
    {
        $sql = 'INSERT INTO post(
            user_id,name,main_key,main_scale,progress_chord,in_chord,A_chord,B_chord,main_chord,C_chord,out_chord,body)
        values(
            :user_id,:name,:main_key,:main_scale,:progress_chord,:in_chord,:A_chord,:B_chord,:main_chord,:C_chord,:out_chord,:body)';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':user_id',$user_id,PDO::PARAM_INT);
        $sth->bindValue(':name',$name,PDO::PARAM_STR);
        $sth->bindValue(':main_key',$main_key,PDO::PARAM_STR);
        $sth->bindValue(':main_scale',$main_scale,PDO::PARAM_STR);
        $sth->bindValue(':progress_chord',$progress_chord,PDO::PARAM_STR);
        $sth->bindValue(':in_chord',$in_chord,PDO::PARAM_STR);
        $sth->bindValue(':A_chord',$A_chord,PDO::PARAM_STR);
        $sth->bindValue(':B_chord',$B_chord,PDO::PARAM_STR);
        $sth->bindValue(':main_chord',$main_chord,PDO::PARAM_STR);
        $sth->bindValue(':C_chord',$C_chord,PDO::PARAM_STR);
        $sth->bindValue(':out_chord',$out_chord,PDO::PARAM_STR);
        $sth->bindValue(':body',$body,PDO::PARAM_STR);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function findPost($id=0)
    {
        $sql = 'SELECT * FROM '.$this->table;
        $sql .= ' WHERE user_id = :id';
        $sth = $this->dbh->prepare($sql);
        $param = [':id'=>$id];
        $sth->execute($param);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function pointFindPost($id=0)
    {
        $sql = 'SELECT * FROM '.$this->table;
        $sql .= ' WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $param = [':id'=>$id];
        $sth->execute($param);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function memPost()
    {
        $sql = 'SELECT * FROM '.$this->table;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    

    public function editPost($id,$main_key,$main_scale,$progress_chord,
                             $in_chord,$A_chord,$B_chord,$main_chord,
                             $C_chord,$out_chord,$body)
    {
        $sql = 'UPDATE post 
                  SET main_key = :main_key, 
                      main_scale = :main_scale, 
                      progress_chord = :progress_chord, 
                      in_chord = :in_chord, 
                      A_chord = :A_chord, 
                      B_chord = :B_chord, 
                      main_chord = :main_chord, 
                      C_chord = :C_chord, 
                      out_chord = :out_chord, 
                      body = :body  
                  WHERE id = :id ';
        $sth = $this->dbh->prepare($sql);
        $param = [':id'=>$id,':main_key'=>$main_key,':main_scale'=>$main_scale,
                  ':progress_chord'=>$progress_chord,':in_chord'=>$in_chord,':A_chord'=>$A_chord,
                  ':B_chord'=>$B_chord,':main_chord'=>$main_chord,':C_chord'=>$C_chord,
                  ':out_chord'=>$out_chord,':body'=>$body];
        $sth->execute($param);
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function deletePost($id)
    {
        $sql = 'DELETE FROM '.$this->table;
        $sql .= ' WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $param = [':id'=>$id];
        $sth->execute($param);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>