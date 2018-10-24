<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Str;
use Cache;

class EmailVerificationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * 参数是 App\Models\User 对象
     * greeting() 方法可以设置邮件的欢迎词；
     * subject() 方法用来设定邮件的标题；
     * line() 方法会在邮件内容里添加一行文字；
     * action() 方法会在邮件内容里添加一个链接按钮。这里就是激活链接，我们暂时把链接设成了主页，接下来我们来实现这个激活链接的逻辑。
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $token = Str::random(16);
        Cache::set('email_verification_' . $notifiable->email, $token, 30);
        $url = route('email_verification.verify', ['email' => $notifiable->email, 'token' => $token]);
        return (new MailMessage)
            ->greeting($notifiable->name . '您好：')
            ->subject('注册成功，请验证你的邮箱！')
            ->line('点击下方的链接来验证')
            ->action('验证', $url)
            ->line('感谢您使用我们的产品!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
