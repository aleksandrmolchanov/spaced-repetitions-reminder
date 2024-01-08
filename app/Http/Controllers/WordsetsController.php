<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\DB;

class WordsetsController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Dashboard', [
            'today' => now()->toFormattedDateString(),
            'wordsets' => [
                'today' => DB::table('wordsets')->where('user_id', auth()->user()->id)->whereDate('learnt_at', now()->toDateString())->first() ??
                    DB::table('wordsets')->where('user_id', auth()->user()->id)->whereNull('learnt_at')->orderBy('id')->first(),
                '1day' => DB::table('wordsets')->where('user_id', auth()->user()->id)->whereDate('learnt_at', now()->subDay()->toDateString())->first(),
                '3days' => DB::table('wordsets')->where('user_id', auth()->user()->id)->whereDate('learnt_at', now()->subDays(4)->toDateString())->first(),
                '7days' => DB::table('wordsets')->where('user_id', auth()->user()->id)->whereDate('learnt_at', now()->subDays(11)->toDateString())->first(),
                '16days' => DB::table('wordsets')->where('user_id', auth()->user()->id)->whereDate('learnt_at', now()->subDays(27)->toDateString())->first(),
            ]
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $update = [];

        if(str_contains($request->input('step'), 'day'))
        {
            $update = [
                'repeat_' . $request->input('step') => $request->input('value')
            ];
        }
        elseif($request->input('step') === 'learnt')
        {
            $update = [
                'learnt_at' => $request->input('value') === 1 ? now()->format('Y-m-d H:i:s') : null,
            ];

            if($request->input('value') === null){
                $update['repeat_1hour'] = 0;
                $update['repeat_8hours'] = 0;
            }
        }
        elseif($request->input('step') === 'repeat_1hour')
        {
            $update = [
                'repeat_1hour' => $request->input('value'),
            ];

            if($request->input('value') === 0){
                $update['repeat_8hours'] = 0;
            }
        }
        elseif($request->input('step') === 'repeat_8hours')
        {
            $update = [
                'repeat_8hours' => $request->input('value')
            ];
        }

        DB::table('wordsets')
            ->where([
                ['id', '=', $id],
                ['user_id', '=', auth()->user()->id]
            ])
            ->update($update);

        return redirect()->back();
    }
}
