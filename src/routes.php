<?php

declare(strict_types=1);

use Dutchento\Agenda\Controllers\SinglePage;

$app->get('/', SinglePage::class)->setName('agenda');
