<?php

namespace Dutchento\Agenda\Factories;

use TANIOS\Airtable\Airtable as TaniosAirtable;

class Airtable
{
    public static function getDbInstance(string $database): TaniosAirtable
    {
        return new TaniosAirtable(array(
            'api_key' => getenv('AIRTABLE_API_KEY'),
            'base' => $database
        ));
    }
}
