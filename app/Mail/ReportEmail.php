<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ReportEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $pdf_name = null;
    private $file_name = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf_name, $file_name = null)
    {
        $this->pdf_name = $pdf_name;
        $this->file_name = $file_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        if ($this->file_name != null) {
            return $this->view('emails.report')->attachFromStorage('public/reports/'.$this->pdf_name, 'report.pdf', [
                'mime' => 'application/pdf'
            ])->attachFromStorage('public/reports/additional_files/'.$this->file_name, $this->file_name);
        }else{
            return $this->view('emails.report')->attachFromStorage('public/reports/'.$this->pdf_name, 'report.pdf', [
                'mime' => 'application/pdf'
            ]);
        }
    }
}
