<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('order_date')
                    ->required()
                    ->format('Y-m-d')
                    ->default(now()->format('Y-m-d')),
                Forms\Components\TextInput::make('total_price')
                    ->disabled()
                    ->default(0),
                Forms\Components\Fieldset::make('Status')
                    ->schema([
                        Forms\Components\Select::make('Pilih Status')
                            ->options([
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required(),
                    ])
                    ->visible(fn ($livewire) => $livewire instanceof Pages\EditOrder),
                Forms\Components\Repeater::make('orderItems')
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->options(Product::all()->pluck('name', 'id'))
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                $product = Product::find($state);
                                if ($product) {
                                    $quantity = $get('quantity') ?: 1;
                                    $set('price', $product->price * $quantity);
                                }
                            }),
                        Forms\Components\TextInput::make('quantity')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                $product = Product::find($get('product_id'));
                                if ($product) {
                                    $set('price', $product->price * $state);
                                }
                            }),
                    ])
                    ->createItemButtonLabel('Tambah Item')
                    ->minItems(1)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $total = 0;
                        foreach ($state as $item) {
                            $total += $item['price'] ?? 0;
                        }
                        $set('total_price', $total);
                    })
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('order_date')
                    ->date('Y-m-d'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('total_price'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}