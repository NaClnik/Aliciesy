<?php


namespace Core\Collections;


use Core\Base\Interfaces\ICollection;

class HeadersCollection implements ICollection
{
    // Поля класса.
    private array $collection;

    // Конструктор.
    public function __construct()
    {
        $this->collection = [];
    } // __construct.

    #region Аксессоры класса
    // Аксессоры класса.
    /**
     * @return array
     */
    public function getCollection(): array
    {
        return $this->collection;
    } // getValueByKey.
    #endregion

    // Методы класса.
    public function push($value)
    {
        array_push($this->collection, $value);

        return $this;
    }

    public function pushArray(array $array){
        $this->collection = array_merge($this->collection, $array);

        return $this;
    } // pushArray.

    public function getValueByKey($key)
    {
        return $this->collection[$key];
    }

} // HeadersCollection.