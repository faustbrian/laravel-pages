<?php

namespace BrianFaust\Pages\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use BrianFaust\Taggable\Contracts\Taggable;
use BrianFaust\Taggable\Traits\Taggable as TaggableTrait;
use BrianFaust\Parsedown\Facades\Parsedown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements SluggableInterface,Taggable
{
    use SoftDeletes;
    use TaggableTrait;
    use SluggableTrait;

    const TYPE_RAW = 'RAW';

    const TYPE_MARKDOWN = 'MARKDOWN';

    const TYPE_HTML = 'HTML';

    const STATUS_PUBLISHED = 'PUBLISHED';

    const STATUS_DRAFT = 'DRAFT';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $casts = ['meta' => 'array'];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
    ];

    public static function boot()
    {
        static::saving(function ($page) {
            if ($page->type === static::TYPE_HTML) {
                $page->title = htmlentities($page->title);
                $page->content = htmlentities($page->content);
            }
        });
    }

    /**
     * @return $this
     */
    public function parse()
    {
        if ($this->type === static::TYPE_MARKDOWN) {
            $this->parseFromMarkdown();
        }

        if ($this->type === static::TYPE_HTML) {
            $this->parseFromHtml();
        }

        return $this;
    }

    private function parseFromMarkdown()
    {
        $this->title = Parsedown::text($this->title);
        $this->content = Parsedown::text($this->content);
    }

    private function parseFromHtml()
    {
        $this->title = html_entity_decode($this->title);
        $this->content = html_entity_decode($this->content);

        $metaTags = '';

        foreach ($this->meta as $key => $value) {
            $metaTags .= '<meta name="'.$key.'" content="'.$value.'">'."\r\n";
        }

        $this->meta = $metaTags;
    }
}
