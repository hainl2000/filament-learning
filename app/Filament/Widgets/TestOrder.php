<?php

namespace App\Filament\Widgets;

use App\Models\Fee;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Set;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Form;
use Livewire\Livewire;
use Webbingbrasil\FilamentAdvancedFilter\Filters\DateFilter;

class TestOrder extends BaseWidget
{
    use InteractsWithActions;

    protected int | string | array $columnSpan = 'full';

    public $testData = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns($this->getTableColumns())
            ->groups(['date'])
            ->filters(
                $this->getTableFilters()
            , layout: Tables\Enums\FiltersLayout::AboveContent)->filtersFormColumns(4);
    }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('filter')
            ->form([
                Select::make('type')
                    ->label('')
                    ->options([
                            '1' => 'type 1',
                            '2' => 'type 2',
                    ])
                    ->default(1)
                    ->native(false),
                DatePicker::make('created_from')
                    ->label('')
                    ->native(false)
                    ->default(now()->startOfYear())
                    ->maxDate((fn (Get $get) => $get('created_to'))),
                DatePicker::make('created_to')
                    ->label('')
                    ->minDate((fn (Get $get) => $get('created_from')))
                    ->default(now()->endOfMonth())
                    ->native(false),
                Select::make('location')
                    ->label('')
                    ->options([
                        0 => 'all',
                        1 => '1',
                        2 => '2'
                    ])
                    ->default(0)
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                        $set('created_to', '2023-12-01');
                    })
                    ->native(false),
            ])
            ->query(function (Builder $query, array $data) {
                if (!empty($data['type'])) {
                    $query = $query->where('type', $data['type']);
                }

                if ($data['location'] != 0) {
                    $query = $query->where('location_id', $data['location']);
                } else {
                    $query = $query->select([
                        'date',
                        DB::raw('SUM(fee1) as fee1'),
                        DB::raw('SUM(fee2) as fee2'),
                        DB::raw('SUM(fee3) as fee3'),
                        DB::raw('SUM(fee4) as fee4')
                    ])->groupBy(['date']);
                }
                return $query;
            })
        ];
    }

    protected function getTableQuery(): Builder
    {
        return Fee::query();
    }


    protected function getTableColumns(): array
    {
        $initArray =  [
            Tables\Columns\TextColumn::make('date'),
            Tables\Columns\TextColumn::make('fee1'),
            Tables\Columns\TextColumn::make('fee2'),
            Tables\Columns\TextColumn::make('fee3'),
            Tables\Columns\TextColumn::make('fee4'),
            Tables\Columns\TextColumn::make('totalFee'),
        ];

        return $initArray;
    }
}
