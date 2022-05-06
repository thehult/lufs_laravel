<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class MemberListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'members';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('first_name', 'Förnamn'),
            TD::make('last_name', 'Efternamn'),
            TD::make('social_security_number', 'Personnummer'),
            TD::make('email_address', 'Emailadress'),
            TD::make('phone_number', 'Telefonnummer'),
            TD::make('street_address', 'Gatuadress'),
            TD::make('zip_code', 'Postkod'),
            TD::make('city', 'Stad')
        ];
    }
}
