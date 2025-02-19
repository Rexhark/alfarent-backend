<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniResource\Pages;
use App\Filament\Resources\TestimoniResource\RelationManagers;
use App\Models\Testimoni;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    protected static ?string $navigationIcon = 'lucide-message-circle-more';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan('full'),
                        TextInput::make('jabatan')
                            ->maxLength(255)
                            ->columnSpan([
                                'sm' => 3
                            ]),
                        TextInput::make('perusahaan')
                            ->maxLength(255)
                            ->columnSpan([
                                'sm' => 3
                            ]),
                        RichEditor::make('testimoni')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpan('full'),
                        FileUpload::make('image')
                            ->image()
                            ->directory('testimoni')
                            ->columnSpan('full'),
                        Toggle::make('is_visible')
                            ->default(true)
                            ->columnSpan('full'),
                        Hidden::make('order')
                            ->default(0),
                    ])
                    ->columns([
                        'sm' => 6,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Section::make()
                    ->schema([
                        Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn(
                                ?Testimoni $record
                            ): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn(
                                ?Testimoni $record
                            ): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ])
                    ->columnSpan([
                        'sm' => 1,
                    ]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('jabatan'),
                TextColumn::make('perusahaan'),
                TextColumn::make('testimoni')
                    ->limit(50),
                ImageColumn::make('image'),
                ToggleColumn::make('is_visible'),
                TextColumn::make('order'),
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
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }
}
