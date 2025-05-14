<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevisionSheetResource\Pages;
use App\Models\RevisionSheet;
use App\Helpers\FontAwesomeIcons;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use FilamentTiptapEditor\TiptapEditor;
use FilamentTiptapEditor\Enums\TiptapOutput;

class RevisionSheetResource extends Resource
{
    protected static ?string $model = RevisionSheet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('icon')
                    ->label('Icône')
                    ->options(FontAwesomeIcons::list)
                    ->searchable()
                    ->reactive(),

                Forms\Components\TextInput::make('title')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('course')
                    ->label('Parcours')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('category')
                    ->label('Catégorie')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('author')
                    ->label('Auteur')
                    ->required()
                    ->maxLength(255),

                TiptapEditor::make('content')
                    ->label('Contenu')
                    ->profile('default')
                    ->output(TiptapOutput::Html)
                    ->extraAttributes(['style' => 'min-height: 300px;'])
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Titre')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category')->label('Catégorie')->sortable(),
                Tables\Columns\TextColumn::make('course')->label('Parcours')->sortable(),
                Tables\Columns\TextColumn::make('author')->label('Auteur')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRevisionSheets::route('/'),
            'create' => Pages\CreateRevisionSheet::route('/create'),
            'edit' => Pages\EditRevisionSheet::route('/{record}/edit'),
        ];
    }
}
