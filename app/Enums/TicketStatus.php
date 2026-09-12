<?php

namespace App\Enums;

enum TicketStatus:string
{

    case Pending = 'pending';

    case LevelOneReview = 'level_one_review';

    case LevelTwoReview = 'level_two_review';

    case Approved = 'approved';

    case Rejected = 'rejected';

    case Sending = 'sending';

    case Sent = 'sent';

    case Failed = 'failed';

}
