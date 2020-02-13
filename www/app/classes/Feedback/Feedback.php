<?php


namespace App\Feedback;


class Feedback
{
    private $data = [];
    private $properties = [
        'feedback', 'id', 'timestamp', 'user_id',
    ];

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    /**
     * Sets all data from array
     * @param $array
     */
    public function setData($array)
    {
        foreach ($this->properties as $property) {
            if (isset($array[$property])) {
                $value = $array[$property];
                $setter = str_replace('_', '', 'set' . $property);
                $this->{$setter}($value);
            }
        }
    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData()
    {
        $data = [];
        foreach ($this->properties as $property) {
            $getter = str_replace('_', '', 'get' . $property);
            $data[$property] = $this->{$getter}();
        }
        return $data;
    }

    /**
     * Gets Review ID
     * @return int|null
     */
    public function getId()
    {
        return $this->data['id'] ?? null;
    }

    /**
     * Sets Review ID
     */
    public function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    /**
     * Sets feedback
     * @param string $feedback
     */
    public function setFeedback(string $feedback)
    {
        $this->data['feedback'] = $feedback;
    }

    /**
     * Returns feedback
     * @return string
     */
    public function getFeedback()
    {
        return $this->data['feedback'] ?? '(tuščia)';
    }

    /**
     * Sets timestamp
     * @param int $timestamp
     */
    public function setTimestamp(int $timestamp)
    {
        $this->data['timestamp'] = $timestamp;
    }

    /**
     * Gets Timestamp
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->data['timestamp'] ?? time();
    }

    /**
     * Sets User ID
     * @param int $id
     */
    public function setUserId(int $id)
    {
        $this->data['user_id'] = $id;
    }

    /**
     * Gets User ID
     * @return mixed
     */
    public function getUserId()
    {
        return $this->data['user_id'] ?? null;
    }
}

