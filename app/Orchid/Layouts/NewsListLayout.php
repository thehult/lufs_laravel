<?php

namespace App\Orchid\Layouts;

use App\Models\News;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class NewsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'news';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('title', 'Titel'),
            TD::make('category', 'Kategori'),
            TD::make('status', 'Status'),
            TD::make('published_at', 'Publicerad'),
            TD::make('created_at', 'Skapad'),
            TD::make('updated_at', 'Uppdaterad'),
            TD::make('edit', '')
                ->render(function(News $news) {
                    return Link::make('Redigera')
                        ->route('platform.news.edit', $news);
                }),
        ];
    }
}
