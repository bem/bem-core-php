<?php
return function ($bh) {
    $bh->match('page__js', function ($ctx, $json) {
        $nonce = $ctx->tParam('nonceCsp');
        $ctx
            ->bem(false)
            ->tag('script');

        if ($json->url) {
            $ctx->attr('src', $json->url);
        } else {
            $ctx->attr('nonce', $nonce);
        }
    });
};
