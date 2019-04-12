<?php

namespace Dutchento\Agenda\Objects;

class SpeakingSlot
{
    private $reference;
    private $speaker;
    private $room;
    private $starttime;
    private $endtime;
    private $name;
    private $description;

    public function __construct(
        string $reference,
        Speaker $speaker,
        string $room,
        \DateTimeImmutable $starttime,
        \DateTimeImmutable $endtime,
        string $name,
        string $description
    ) {
        $this->reference = $reference;
        $this->speaker = $speaker;
        $this->room = $room;
        $this->starttime = $starttime;
        $this->endtime = $endtime;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function reference(): string
    {
        return $this->reference;
    }

    /**
     * @return Speaker
     */
    public function speaker(): Speaker
    {
        return $this->speaker;
    }

    /**
     * @return string
     */
    public function room(): string
    {
        return $this->room;
    }

    /**
     * @return int
     */
    public function starttime(): string
    {
        return $this->starttime->format('H:i');
    }

    /**
     * @return int
     */
    public function endtime(): string
    {
        return $this->endtime->format('H:i');
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }
}

