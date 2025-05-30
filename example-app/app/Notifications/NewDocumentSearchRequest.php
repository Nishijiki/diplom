<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\DocumentSearch;

class NewDocumentSearchRequest extends Notification
{
    use Queueable;

    protected $documentSearch;

    public function __construct(DocumentSearch $documentSearch)
    {
        $this->documentSearch = $documentSearch;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Новый запрос на поиск документа')
            ->line('Поступил новый запрос на поиск документа.')
            ->line('Тип документа: ' . $this->documentSearch->document_type)
            ->line('Номер документа: ' . $this->documentSearch->document_number)
            ->line('Дата документа: ' . $this->documentSearch->document_date)
            ->line('Ключевые слова: ' . $this->documentSearch->keywords)
            ->action('Просмотреть в админ-панели', url('/admin/document-searches/' . $this->documentSearch->id));
    }

    public function toArray($notifiable)
    {
        return [
            'document_search_id' => $this->documentSearch->id,
            'document_type' => $this->documentSearch->document_type,
            'document_number' => $this->documentSearch->document_number,
            'document_date' => $this->documentSearch->document_date,
            'keywords' => $this->documentSearch->keywords,
        ];
    }
} 