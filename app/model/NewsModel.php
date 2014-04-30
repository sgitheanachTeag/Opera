<?php
class NewsModel extends Model {
    public function fetchAll() {
        return $this->connection->table('news')
        ->order('dt_from DESC');
    }


    public function insert($data) {
        $this->connection->table('news')
            ->insert($data);
    }

}
