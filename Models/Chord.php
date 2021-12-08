<?php
require_once(ROOT_PATH .'/Models/Db.php');

class MajorChord extends Db
{
    private $table = 'major_chord';

    public function __construct($dbh = null)
    {  
       parent::__construct($dbh); 
    }

    public function findMajorChord()
    {
        $sql = 'SELECT * FROM '.$this->table;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}


class MinorChord extends Db
{
    private $table = 'minor_chord';

    public function __construct($dbh = null)
    {  
       parent::__construct($dbh); 
    }

    public function findMinorChord()
    {
        $sql = 'SELECT * FROM '.$this->table;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>