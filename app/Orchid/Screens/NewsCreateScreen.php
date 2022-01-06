<?php

namespace App\Orchid\Screens;

use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class NewsCreateScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Skapa nyhet';


    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('title')
                    ->title('Rubrik')
                    ->required()
                    ->placeholder('En intressant rubrik'),
                Cropper::make('image')
                    ->title('Omslagsbild')
                    ->maxFileSize(4)
                    ->targetRelativeUrl(),
                Quill::make('content')
                    ->title('Brödtext')
                    ->required()
                    ->placeholder('En intressantare brödtext'),
                CheckBox::make('featured')
                    ->placeholder('Featured')
                    ->value(1)
                    ->sendTrueOrFalse()
                    ->title('Publicera till: '),
                Select::make('category')
                    ->title('Kategori')
                    ->options([
                        'club' => 'Klubben',
                        'discgolf' => 'Discgolf',
                        'allround' => 'Allround',
                        'other' => 'Övrigt',
                    ]),
                Select::make('status')
                    ->title('Status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published'
                    ]),
                Button::make('Spara')
                    ->method('saveNews')
                    ->icon('save')
                    ->block()
            ])
        ];
    }

    public function saveNews(Request $request) {
        $request->validate([
            'title' => 'required|min:4|max:64',
            'content' => 'required|min:32'
        ]);

        Alert::info('Nyhet publicerad!');
    }
}
