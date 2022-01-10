<?php

namespace App\Orchid\Screens;

use App\Models\News;
use App\Orchid\Layouts\NewsListLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class NewsListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Nyheter';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'news' => News::paginate()
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
            Link::make('Skapa nyhet')
                ->icon('pencil')
                ->route('platform.news.edit'),
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
            NewsListLayout::class
        ];
    }
}
