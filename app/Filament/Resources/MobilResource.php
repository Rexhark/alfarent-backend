<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MobilResource\Pages;
use App\Filament\Resources\MobilResource\RelationManagers;
use App\Models\Mobil;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MobilResource extends Resource
{
    protected static ?string $model = Mobil::class;

    protected static ?string $navigationIcon = 'lucide-car';

    protected static ?string $navigationLabel = 'Daftar Mobil';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan([
                                'sm' => 6,
                            ]),

                        Textarea::make('deskripsi')
                            ->rows(4)
                            ->required()
                            ->columnSpan([
                                'sm' => 6,
                            ]),

                        FileUpload::make('image')
                            ->directory('mobil-images')
                            ->image()
                            ->columnSpan([
                                'sm' => 6,
                            ]),

                        TextInput::make('harga')
                            ->numeric()
                            ->prefix('Rp')
                            ->step(10000)
                            ->required()
                            ->columnSpan([
                                'sm' => 6 / 2,
                            ]),

                        TextInput::make('kapasitas')
                            ->numeric()
                            ->suffix('orang')
                            ->required()
                            ->columnSpan([
                                'sm' => 6 / 2,
                            ]),

                        TextInput::make('view')
                            ->numeric()
                            ->hidden()
                            ->default(0),

                        Select::make('transmisi')
                            ->options([
                                'AT' => 'Automatic',
                                'MT' => 'Manual',
                            ])
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                            ]),

                        Select::make('bahan_bakar')
                            ->options([
                                'Bensin' => 'Bensin',
                                'Solar' => 'Solar',
                                'Listrik' => 'Listrik',
                            ])
                            ->required()
                            ->columnSpan([
                                'sm' => 2,
                            ]),

                        TextInput::make('tahun')
                            ->maxLength(4)
                            ->numeric()
                            ->default(date('Y'))
                            ->columnSpan([
                                'sm' => 2,
                            ]),
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
                                ?Mobil $record
                            ): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn(
                                ?Mobil $record
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
                TextColumn::make('nama')->searchable(),
                TextColumn::make('harga')->sortable(),
                ImageColumn::make('image'),
                TextColumn::make('kapasitas')->sortable(),
                TextColumn::make('transmisi'),
                TextColumn::make('bahan_bakar'),
                TextColumn::make('tahun')->sortable(),
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
            'index' => Pages\ListMobils::route('/'),
            'create' => Pages\CreateMobil::route('/create'),
            'edit' => Pages\EditMobil::route('/{record}/edit'),
        ];
    }
}
