<?php
// app/Blocks/QuoteBlock.php

namespace App\Blocks;

use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;

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

    protected function fields(): array
    {
        return [
            Textarea::make('Contenu', 'blockquote')->rows(4)->newLines('br'),
            Image::make('Photo', 'avatar')->returnFormat('id'),
            Text::make('Nom', 'fullname'),
            Text::make('Fonction', 'function'),
        ];
    }
}
