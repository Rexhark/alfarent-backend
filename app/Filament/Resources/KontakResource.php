<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Filament\Resources\KontakResource\RelationManagers;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'lucide-contact';

    protected static ?string $navigationLabel = 'Info Kontak';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make()
                ->schema([
                    TextInput::make('key')
                        ->label('Key')
                        ->required()
                        ->datalist([
                            'kantor-pusat',
                            'jam-operasional',
                            'telepon',
                            'email',
                            'whatsapp',
                            'instagram',
                            'facebook',
                            'map',
                        ])
                        ->columnSpan([
                            'sm' => 3,
                        ]),
                    Select::make('type')
                        ->label('Type')
                        ->required()
                        ->options([
                            'text' => 'Text',
                            'link' => 'Link',
                            'map' => 'Map',
                        ])
                        ->columnSpan([
                            'sm' => 3,
                        ]),
                    TextInput::make('value')
                        ->label('Value')
                        ->required()
                        ->columnSpan('full'),
                    Toggle::make('is_visible')
                        ->label('Is visible')
                        ->default(true)
                        ->columnSpan('full'),
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
                            ?Kontak $record
                        ): string => $record ? $record->created_at->diffForHumans() : '-'),
                    Placeholder::make('updated_at')
                        ->label('Last modified at')
                        ->content(fn(
                            ?Kontak $record
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
                TextColumn::make('key')
                    ->label('Key')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('value')
                    ->label('Value')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),
                ToggleColumn::make('is_visible')
                    ->label('Is visible'),
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
            'index' => Pages\ListKontaks::route('/'),
            'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}
