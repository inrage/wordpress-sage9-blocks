<?php

namespace App\Blocks;

use function App\asset_path;

abstract class AbstractBlock
{
    public string $name = '';
    public string $icon = '';

    public function __construct()
    {
        add_action('acf/init', [$this, 'registerBlockType']);
    }

    public function registerBlockType(): void
    {
        acf_register_block_type([
            'name' => $this->name,
            'title' => $this->labels()['title'],
            'description' => $this->labels()['description'],
            'render_callback' => [$this, 'acfBlockRenderCallback'],
            'category' => 'layout',
            'icon' => $this->icon,
            'enqueue_style' => asset_path('styles/' . $this->name . '.css'),
            'example' => [
                'attributes' => [
                    'mode' => 'preview',
                    'data' => [
                        'image_path' => \App\asset_path('images/blocks-previews/' . $this->name . '.jpg'),
                    ]
                ]
            ],
        ]);
    }

    abstract protected function labels(): array;

    public function acfBlockRenderCallback($block, $content, $is_preview)
    {
        if ($is_preview && isset($block['data']['image_path'])) {
            echo '<img class="img-fluid" src="' . $block['data']['image_path'] . '"
            alt="' . $this->name . '" />';
            return;
        }

        echo \App\template(
            \App\locate_template('views/blocks/block-' . $this->name . '.blade.php'),
            ['block' => $block]
        );
    }
}
