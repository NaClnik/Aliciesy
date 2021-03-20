<?php


namespace Core\Base\Abstracts;


use Core\Collections\HeadersCollection;

abstract class CoreResponse
{
    // Поля класса.
    protected string $content;
    protected HeadersCollection $headers;
    protected int $statusCode;

    #region Аксессоры класса
    // Аксессоры класса.
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return HeadersCollection
     */
    public function getHeaders(): HeadersCollection
    {
        return $this->headers;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
    #endregion

    // Методы класса.
    public function addHeader(string $header, string $value, string $parameter = null)
    {
        $addHeader = "$header: $value";

        if($parameter){
            $addHeader .= "; $parameter";
        } // if.

        $this->headers->push($addHeader);

        return $this;
    } // addHeader.
} // CoreResponse.