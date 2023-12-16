<?php

namespace App\Enums;

enum PlanStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
}
