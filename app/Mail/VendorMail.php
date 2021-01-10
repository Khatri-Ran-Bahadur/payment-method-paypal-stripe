<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        
    }


   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // ->attach('file[0]', fopen($request->file[0], 'r'))
        // ->attach('file[1]', fopen($request->file[1], 'r'))
      
        $this->attachment = $this->details['attachments'];
        $message = $this->subject($this->details['subject'])
                    ->markdown($this->details['template'])
                    ->from($this->details['from'], $this->details['from'])
                    ->with(['plant'=>$this->details['plant'],'data'=>$this->details['data']]);

        if ($this->attachment) {
            foreach($this->attachment as $file)
                $message->attach($file[0], [
                    'as' => $file[1]['ext'], 
                    'mime' => $file[1]['mime']
                ]);
        }

        return $message;
    }
}