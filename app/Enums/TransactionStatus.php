<?php

namespace App\Enums;

enum TransactionStatus: string
{
    case PENDING = "pending";
    case APPROVED = "approved";
    case EXPIRED = "expired";

    public function getLottieFile(): string
    {
        return match ($this) {
            self::APPROVED => 'check',
            self::EXPIRED => 'expired',
            default => 'wait'
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::APPROVED => 'Pagamento Aprovado',
            self::EXPIRED => 'Estamos verificando<br />o sistema',
            default => 'Pagamento Pendente'
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::APPROVED => 'bg-approved',
            self::EXPIRED => 'bg-expired',
            default => ''
        };
    }
}
