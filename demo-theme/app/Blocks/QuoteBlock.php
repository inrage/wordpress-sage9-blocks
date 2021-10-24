<?php
// app/Blocks/QuoteBlock.php

namespace App\Blocks;

class QuoteBlock extends AbstractBlock
{
    public string $name = 'quote';
    public string $icon = 'format-quote';

    protected function labels(): array
    {
        return [
            'title' => __('Témoignage', 'sage'),
            'description' => __('Affiche un bloc bleu pleine page avec un témoignage', 'sage')
        ];
    }
}
