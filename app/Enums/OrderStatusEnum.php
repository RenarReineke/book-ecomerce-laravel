<?php

namespace App\Enums;

enum OrderStatusEnum: string {
    case Processed = 'Оформлен';
    case Pending = 'Ожидает отправки';
    case Dispatched = 'Отправлен';
    case Delivered = 'Доставлен';
    case Completed = 'Завершен';
    case Canselled = 'Отменен';
}