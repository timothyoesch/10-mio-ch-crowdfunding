<?php

namespace App\Filament\Resources\Votes\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VotesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('begins_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('ends_at')
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Action::make('startVote')
                    ->label('Start Vote')
                    ->action(function () {
                        // Check if a vote is already active
                        $activeVote = \App\Models\Vote::where('active', true)->first();
                        if ($activeVote) {
                            // Make a notification to inform the user
                            \Filament\Notifications\Notification::make()
                                ->title('A vote is already active.')
                                ->danger()
                                ->send();
                            return;
                        } else {
                            // Start a new vote
                            $newVote = new \App\Models\Vote();
                            $newVote->begins_at = now();
                            $newVote->active = true;
                            $newVote->save();

                            // Make a notification to inform the user
                            \Filament\Notifications\Notification::make()
                                ->title('A new vote has been started.')
                                ->success()
                                ->send();
                        }
                    })
                    ->visible(fn () => \App\Models\Vote::where('active', true)->count() === 0),
                Action::make('endVote')
                    ->label('End Vote')
                    ->action(function () {
                        $activeVote = \App\Models\Vote::where('active', true)->first();
                        if ($activeVote) {
                            $activeVote->ends_at = now();
                            $activeVote->active = false;
                            $activeVote->save();
                            // Make a notification to inform the user
                            \Filament\Notifications\Notification::make()
                                ->title('The active vote has been ended.')
                                ->success()
                                ->send();
                        } else if (\App\Models\Vote::where('active', true)->count() > 1 ) {
                            // Make a notification to inform the user
                            \Filament\Notifications\Notification::make()
                                ->title('Error: More than one active vote found. Please check the database.')
                                ->danger()
                                ->send();
                        } else {
                            // Make a notification to inform the user
                            \Filament\Notifications\Notification::make()
                                ->title('No active vote found to end.')
                                ->warning()
                                ->send();
                        }
                    })
                    ->visible(fn () => \App\Models\Vote::where('active', true)->count() === 1),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('1s');
    }
}
