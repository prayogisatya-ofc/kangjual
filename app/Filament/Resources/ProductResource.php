<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->columns(3)
                    ->schema([
                        Section::make('Product Information')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live()
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->readOnly()
                                    ->helperText('Slug akan terisi otomatis ketika title diisi.'),
                                Grid::make()
                                    ->schema([
                                        Forms\Components\Select::make('category_id')
                                            ->required()
                                            ->relationship('category', 'title')
                                            ->label('Category'),
                                        Forms\Components\TextInput::make('price')
                                            ->required()
                                            ->numeric()
                                            ->default(0)
                                            ->prefix('Rp'),
                                    ]),
                                Forms\Components\Select::make('type')
                                    ->required()
                                    ->options([
                                        'project' => 'Project',
                                        'template' => 'Template'
                                    ]),
                                Forms\Components\Textarea::make('excerpt')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('description')
                                    ->required()
                                    ->maxLength(65535),
                                Forms\Components\FileUpload::make('file')
                                    ->required()
                                    ->disk('private')
                                    ->directory('product/file')
                            ])->columnSpan(2),
                        Grid::make()
                            ->columns(1)
                            ->schema([
                                Section::make('Status')
                                    ->schema([
                                        Forms\Components\Toggle::make('is_free')
                                            ->required(),
                                        Forms\Components\Toggle::make('is_published')
                                            ->required(),
                                    ]),
                                Section::make('Thumbnail')
                                    ->schema([
                                        Forms\Components\FileUpload::make('thumbnail')
                                            ->required()
                                            ->image()
                                            ->directory('product/thumbnail')
                                            ->hiddenLabel(true),
                                    ])
                            ])->columnSpan(1),
                    ]),
                Section::make('Gallery')
                    ->schema([
                        Forms\Components\FileUpload::make('gallery')
                            ->required()
                            ->image()
                            ->multiple()
                            ->directory('product/gallery')
                            ->hiddenLabel(true),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->description(fn (Product $record): string => $record->category->title),
                Tables\Columns\TextColumn::make('price')
                    ->numeric()
                    ->prefix('Rp ')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_free')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
