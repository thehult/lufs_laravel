<?php

namespace App\Orchid\Screens;

use App\Models\Member;
use App\Orchid\Layouts\MemberListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class MemberListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Medlemmar';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'members' => Member::paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Exportera CSV')
            ->icon('export')
            ->method('export')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            MemberListLayout::class
        ];
    }
}
