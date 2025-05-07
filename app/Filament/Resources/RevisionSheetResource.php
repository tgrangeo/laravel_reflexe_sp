<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevisionSheetResource\Pages;
use App\Models\RevisionSheet;
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
                Forms\Components\TextInput::make('type')
                    ->label('Type')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('categorie')
                    ->label('Catégorie')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('titre')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('chapitre')
                    ->label('Chapitre')
                    ->maxLength(255),

                Forms\Components\TagsInput::make('tags')
                    ->label('Tags'),

                Forms\Components\Select::make('criticite')
                    ->label('Criticité')
                    ->options([
                        'faible' => 'Faible',
                        'moyenne' => 'Moyenne',
                        'elevee' => 'Élevée',
                    ])
                    ->nullable(),

                Forms\Components\Select::make('frequenceUtilisation')
                    ->label('Fréquence d\'utilisation')
                    ->options([
                        'rare' => 'Rare',
                        'occasionnelle' => 'Occasionnelle',
                        'frequente' => 'Fréquente',
                    ])
                    ->nullable(),

                Forms\Components\Toggle::make('favorite')
                    ->label('Favori'),
                
                TiptapEditor::make('content')
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
                Tables\Columns\TextColumn::make('titre'),
                Tables\Columns\TextColumn::make('categorie'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('chapitre'),
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
        return [
            //
        ];
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
