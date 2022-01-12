<?php

namespace App\Orchid\Screens;

use App\Models\Page;
use App\Orchid\Layouts\PageListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PageListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Sidor';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'pages' => Page::paginate()
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
            Link::make('Skapa sida')
                ->icon('pencil')
                ->route('platform.pages.edit')
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
            PageListLayout::class
        ];
    }
}
