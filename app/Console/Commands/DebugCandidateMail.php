<?php

namespace App\Console\Commands;

use App\Mail\CandidateStatusUpdated;
use App\Models\Candidature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

class DebugCandidateMail extends Command
{
    protected $signature = 'debug:candidate-mail {--to= : Send a direct Mail::raw test to this address} {--send : Actually send the direct test email}';

    protected $description = 'Inspect candidate notification mail and queue configuration.';

    public function handle(): int
    {
        $this->info('Mail configuration');
        $this->line('MAIL_MAILER: '.config('mail.default'));
        $this->line('SMTP host: '.config('mail.mailers.smtp.host'));
        $this->line('SMTP port: '.config('mail.mailers.smtp.port'));
        $this->line('SMTP scheme: '.(config('mail.mailers.smtp.scheme') ?: 'null'));
        $this->line('SMTP username set: '.(config('mail.mailers.smtp.username') ? 'yes' : 'no'));
        $this->line('SMTP password length: '.strlen((string) config('mail.mailers.smtp.password')));
        $this->line('From: '.config('mail.from.address').' / '.config('mail.from.name'));

        $this->newLine();
        $this->info('Queue configuration');
        $this->line('QUEUE_CONNECTION: '.config('queue.default'));
        $this->line('Database queue table: '.config('queue.connections.database.table'));
        $this->line('Default database queue: '.config('queue.connections.database.queue'));

        foreach (['jobs', 'failed_jobs'] as $table) {
            try {
                $this->line($table.' count: '.DB::table($table)->count());
            } catch (Throwable $exception) {
                $this->warn($table.' count failed: '.$exception->getMessage());
            }
        }

        try {
            $jobs = DB::table('jobs')
                ->select('id', 'queue', 'attempts', 'available_at', 'created_at')
                ->latest('id')
                ->limit(10)
                ->get();

            if ($jobs->isNotEmpty()) {
                $this->newLine();
                $this->info('Latest queued jobs');
                $jobs->each(fn ($job) => $this->line(json_encode($job)));
            }
        } catch (Throwable $exception) {
            $this->warn('Unable to inspect jobs table: '.$exception->getMessage());
        }

        $candidate = new Candidature([
            'nom' => 'Debug',
            'prenom' => 'Candidate',
            'email' => $this->option('to') ?: config('mail.from.address'),
            'status' => 'accepted',
        ]);

        try {
            $mailable = new CandidateStatusUpdated($candidate, 'accepted');
            $html = $mailable->render();
            $this->newLine();
            $this->info('Mailable render: ok ('.strlen($html).' bytes)');
            $this->line('Mailable subject: '.$mailable->envelope()->subject);
        } catch (Throwable $exception) {
            $this->error('Mailable render failed: '.$exception->getMessage());

            return self::FAILURE;
        }

        if ($this->option('send')) {
            $to = $this->option('to') ?: config('mail.from.address');

            try {
                Mail::raw('Laravel direct Mail::raw debug test from Ennova.', function ($message) use ($to) {
                    $message->to($to)->subject('Ennova direct mail debug test');
                });

                $this->info('Direct Mail::raw sent to '.$to);
            } catch (Throwable $exception) {
                $this->error('Direct Mail::raw failed: '.$exception->getMessage());

                return self::FAILURE;
            }
        }

        return self::SUCCESS;
    }
}
