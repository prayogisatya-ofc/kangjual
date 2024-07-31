<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Psy\Readline\Transient;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Transaction Information')
                    ->schema([
                        Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('invoice')
                                    ->required(),
                                Forms\Components\Select::make('product_id')
                                    ->required()
                                    ->relationship('product', 'title')
                                    ->searchable(),
                                Forms\Components\TextInput::make('down_avail')
                                    ->required()
                                    ->numeric()
                                    ->label('Download Available')
                                    ->default(0),
                                Forms\Components\Select::make('status')
                                    ->required()
                                    ->options([
                                        'pending' => 'Pending',
                                        'payed' => 'Paid',
                                        'canceled' => 'Canceled',
                                    ]),
                                Forms\Components\TextInput::make('snap_token')
                                    ->readOnly()
                                    ->columnSpan(2),
                            ])
                    ])->columnSpan(2),
                Section::make('Customer Info')
                    ->schema([
                        Forms\Components\TextInput::make('buyer_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email(),
                        Forms\Components\Textarea::make('reason')
                    ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice')
                    ->searchable(),
                Tables\Columns\TextColumn::make('buyer_name')
                    ->searchable()
                    ->description(fn (Transaction $record): string => $record->email),
                Tables\Columns\TextColumn::make('product.title')
                    ->searchable()
                    ->words(4),
                Tables\Columns\TextColumn::make('product.price')
                    ->numeric()
                    ->prefix('Rp '),
                Tables\Columns\TextColumn::make('down_avail')
                    ->label('Download'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'payed' => 'success',
                        'canceled' => 'danger',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'payed' => 'heroicon-o-check-circle',
                        'canceled' => 'heroicon-o-x-circle',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
