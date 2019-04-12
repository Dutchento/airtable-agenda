<?php

namespace Dutchento\Agenda\Objects;

class Speaker
{
    private $reference;
    private $fullname;
    private $company;

    public function __construct(string $reference, string $fullname, string $company)
    {
        $this->reference = $reference;
        $this->fullname = $fullname;
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function reference(): string
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function fullname(): string
    {
        return $this->fullname;
    }

    /**
     * @return string
     */
    public function company(): string
    {
        return $this->company;
    }
}
