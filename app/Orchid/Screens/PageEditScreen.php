<?php

namespace App\Orchid\Screens;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PageEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Skapa sida';

    public $exists = false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Page $page): array
    {
        $this->exists = $page->exists;

        if ($this->exists)
            $this->name = 'Redigera sida';
        
        return [
            'page' => $page
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
                Input::make('page.slug')
                    ->title('Url')
                    ->required()
                    ->placeholder('/vad/som/skrivs/i/adressen'),
                Input::make('page.title')
                    ->title('Titel')
                    ->required()
                    ->placeholder('Titel'),
                Cropper::make('page.image')
                    ->title('Omslagsbild')
                    ->maxFileSize(4)
                    ->targetRelativeUrl(),
                Quill::make('page.content')
                    ->title('Innehåll')
                    ->required()
                    ->placeholder('Vad besökaren ser!'),
            ])
        ];
    }

    public function save(Page $page, Request $request) {
        $request->validate([
            'page.title' => 'required|min:4|max:64',
            'page.content' => 'required|min:32'
        ]);

        $fields = $request->get('page');
        $fields['author'] = Auth::user()->id;
        if (!str_starts_with($fields['slug'], '/'))
            $fields['slug'] = '/' . $fields['slug'];

        $page->fill($fields)->save();

        Alert::info('Sida publicerad!');
        
        return redirect()->route('platform.pages.list');
    }

    public function remove(Page $page) {
        $page->delete();
        
        Alert::info('Sida borttagen!');
        
        return redirect()->route('platform.pages.list');
    }
}
