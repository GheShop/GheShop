<?php

namespace App\Mail;

use function GuzzleHttp\default_ca_bundle;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $mailto = '';
    private $type = '';
    private $data=[];
    public function __construct($mailto,$type,$data)
    {
        $this->type = $type;
        $this->mailto = $mailto;
        $this->data['data'] = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->type){
            case 1:
//                forgot password
                return $this->view('admin.mail.forgotPassword',$this->data)->to($this->mailto)->subject("Reset Password Gheshop.com");
                break;
            case 2:
//                order
                    break;
            default:
                break;
        }
    }
}
