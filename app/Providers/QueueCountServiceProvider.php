<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Helpers;

class QueueCountServiceProvider extends ServiceProvider
{
    /**
     * Render queues counter.
     *
     * @return array|$data
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $data['reception_count'] = Helpers::getRecordCount($stage = 1);
            $data['entry_count'] = Helpers::getRecordCount($stage = 2);
            $data['pre_count'] = Helpers::getRecordCount($stage = 3);
            $data['filling_count'] = Helpers::getRecordCount($stage = 4);
            $data['delete_count'] = Helpers::getRecordCount($stage = 5);
            $data['verification_count'] = Helpers::getRecordCount($stage = 6);
            $data['dispatch_count'] = Helpers::getRecordCount($stage = 7);
            $data['invoice_count'] = Helpers::getRecordCount($stage = 8);
            $data['onhold_count'] = Helpers::getRecordCount($stage = 9);
            $data['complete_count'] = Helpers::getRecordCount($stage = 10);
            $data['all_count'] = Helpers::getRecordCount($stage = 'all');
            $view->with('counter', $data);
        });
    }
}
