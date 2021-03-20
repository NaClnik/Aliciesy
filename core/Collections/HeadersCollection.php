<?php


namespace Core\Collections;


use Core\Base\Interfaces\ICollection;

class HeadersCollection implements ICollection
{
    // Поля класса.
    private array $collection;

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

    public function getValueByKey($key)
    {
        return $this->collection[$key];
    }

} // HeadersCollection.