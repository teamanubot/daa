<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PayMethodResource\Pages;
use App\Filament\Admin\Resources\PayMethodResource\RelationManagers;
use App\Models\PayMethod;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PayMethodResource extends Resource
{
    protected static ?string $model = PayMethod::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('method_name')
                    ->label('Method Name')
                    ->required()
                    ->unique(PayMethod::class, 'method_name')
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->rows(3),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('method_name')
                    ->label('Method Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPayMethods::route('/'),
            'create' => Pages\CreatePayMethod::route('/create'),
            'edit' => Pages\EditPayMethod::route('/{record}/edit'),
        ];
    }
}
