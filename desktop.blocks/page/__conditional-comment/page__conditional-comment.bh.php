<?php
return function ($bh) {

    $bh->match('page__conditional-comment', function ($ctx, $json) {
        $ctx->tag(false);

        $cond = str_replace(['<', '>', '='], ['lt', 'gt', 'e'], $json->condition);
        $hasNegation = strpos($cond, '!') !== false;
        $includeOthers = $json->msieOnly === false;
        $hasNegationOrIncludeOthers = $hasNegation || $includeOthers;

        return [
            '<!--[if ' . $cond . ']>',
            $includeOthers? '<!' : '',
            $hasNegationOrIncludeOthers? '-->' : '',
            $json,
            $hasNegationOrIncludeOthers? '<!--' : '',
            '<![endif]-->'
        ];
    });

};
