<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RedirectResource\Pages;
use App\Filament\Resources\RedirectResource\RelationManagers;
use App\Models\Redirect;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class RedirectResource extends Resource
{

    protected static ?string $model = Redirect::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModel(): string
    {
        return Redirect::class;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('url')
                ->url()
                ->required()
                ->label('URL de destino'),
            Forms\Components\Toggle::make('active')
                ->label('Ativo'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('code')->label('Código'),
            IconColumn::make('active')
                ->label('Ativo')
                ->boolean()
                ->trueIcon('heroicon-s-check')
                ->falseIcon('heroicon-s-x'),
            Tables\Columns\TextColumn::make('url')->label('URL de destino'),
            Tables\Columns\TextColumn::make('updated_at')->label('Última Atualização')
                ->dateTime(),
        ])->filters([
            //
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
            'index' => Pages\ListRedirects::route('/'),
            'create' => Pages\CreateRedirect::route('/create'),
            'edit' => Pages\EditRedirect::route('/{record}/edit'),
        ];
    }
}
