<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\tb_laboratorium;
use App\tb_bidang;

class TeknisiNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status,$id_lab,$id_bidang,$user,$tipe)
    {
        $this->status = $status;
        $this->id_lab = $id_lab;
        $this->id_bidang = $id_bidang;
        $this->user = $user;
        $this->tipe = $tipe;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $status = $this->status;
        $id_bidang = $this->id_bidang;
        $id_lab = $this->id_lab;
        $pesan = '';

        $lab = tb_laboratorium::find($id_lab);
        $bid = tb_bidang::find($id_bidang);

        $nama_bid = $bid->nama_bidang;
        $nama_lab = $lab->nama_lab;

        if($status == 1){
            $pesan = "Teknisi ".$this->user->name." Mengajukan Penambahan Bidang Baru";
        }else if($status == 2){
            $pesan = "Teknisi ".$this->user->name." Mengajukan Pembatalan Pengajuan Bidang ".$nama_bid."";
        }else if($status == 3){
            $pesan = "Teknisi ".$this->user->name." Mengajukan Pembaharuan Bidang ".$nama_bid."";
        }else if($status == 4){
            $pesan = "Teknisi ".$this->user->name." Mengajukan Penambahan Layanan Pada Bidang ".$nama_bid."";
        }else if($status == 5){
            $pesan = "Teknisi ".$this->user->name." Mengajukan Pembatalan Pengajuan Layanan Pada Bidang ".$nama_bid."";
        }else if($status == 6){
            $pesan = "Teknisi ".$this->user->name." Mengajukan Pembaharuan Layanan Pada Bidang ".$nama_bid."";
        }else if($status == 7){
            $pesan = "Teknisi ".$this->user->name." Mengajukan Penghapusan Layanan Pada Bidang ".$nama_bid."";
        }


        $data = ['pesan' => $pesan, 'id_bidang' => $id_bidang,'nama_bid' => $nama_bid, 'id_lab' => $id_lab, 'nama_lab' => $nama_lab,'tipe'=>$this->tipe];

        return $data;
    }
}
