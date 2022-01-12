<?php

namespace App\Orchid\Screens;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class NewsEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Skapa nyhet';


    public $exists = false;


    /**
     * Query data.
     *
     * @return array
     */
    public function query(News $news): array
    {
        $this->exists = $news->exists;

        if($this->exists) 
            $this->name = 'Redigera nyhet';
        return [
            'news' => $news
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
            Button::make('Spara')
                ->icon('save')
                ->method('save'),
            Button::make('Ta bort')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
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
            Layout::rows([
                Input::make('news.title')
                    ->title('Rubrik')
                    ->required()
                    ->placeholder('En intressant rubrik'),
                Cropper::make('news.image')
                    ->title('Omslagsbild')
                    ->maxFileSize(4)
                    ->targetRelativeUrl(),
                Quill::make('news.content')
                    ->title('Brödtext')
                    ->required()
                    ->placeholder('En intressantare brödtext'),
                CheckBox::make('news.featured')
                    ->placeholder('Featured')
                    ->value(1)
                    ->sendTrueOrFalse()
                    ->title('Publicera till: '),
                Select::make('news.category')
                    ->title('Kategori')
                    ->options([
                        'club' => 'Klubben',
                        'discgolf' => 'Discgolf',
                        'allround' => 'Allround',
                        'other' => 'Övrigt',
                    ]),
                Select::make('news.status')
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

    public function save(News $news, Request $request) {
        $request->validate([
            'news.title' => 'required|min:4|max:64',
            'news.content' => 'required|min:32'
        ]);

        $fields = $request->get('news');
        $fields['author'] = Auth::user()->id;
        error_log(print_r($fields));

        $news->fill($fields)->save();

        Alert::info('Nyhet publicerad!');
        
        return redirect()->route('platform.news.list');
    }

    public function remove(News $news) {
        $news->delete();
        
        Alert::info('Nyhet borttagen!');
        
        return redirect()->route('platform.news.list');
    }
}
