<?php
return function ($bh) {

    $bh->match('greeting-card', function ($ctx) use ($bh) {
        // Just a stub because of i18n
        $ctx->content('greeting-card:message');
    });

};
