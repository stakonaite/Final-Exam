<?php


namespace App\Feedback;

use App\App;

class Model
{
    private $table_name = 'feedbacks';

    public function __construct()
    {
        App::$db->createTable($this->table_name);
    }

    public function insert(Feedback $feedback)
    {
        return App::$db->insertRow($this->table_name, $feedback->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = [])
    {
        $feedbacks = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);

        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $feedbacks[] = new Feedback($row_data);
        }

        return $feedbacks;
    }

    /**
     * @return bool
     */
    public function update(Feedback $feedback)
    {
        return App::$db->updateRow($this->table_name, $feedback->getId(), $feedback->getData());
    }

    /**
     * deletes all participants from database
     * @return bool
     */
    public function delete(Feedback $feedback)
    {
        return App::$db->deleteRow($this->table_name, $feedback->getId());
    }

    public function __destruct()
    {
        App::$db->save();
    }
}