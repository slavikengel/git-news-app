<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class News extends Model
{
    /**
     * Заполняемые свойства модели.
     *
     * @var array
     */
    protected $fillable = [
         'title', 'slug', 'content', 'user_id',
    ];

    /**
     * Автор новости.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Мутатор для поля title, формирует slug.
     *
     * @param $value
     * @return void
     */
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     * Мутатор для поля title, прогонем поле черел HTMLPurifier.
     *
     * @param $value
     * @return void
     */
    public function setContentAttribute($value){
        $this->attributes['content'] = clean($value);
    }

    /**
     * Приобразуем md content в html
     *
     * @return string
     */
    public function getMarkdownContentAttribute() {
        return (new Parsedown)->text($this->attributes['content']);
    }
}
