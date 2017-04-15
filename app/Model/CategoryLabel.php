<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryLabel
 * @package App\Model
 */
class CategoryLabel extends Model
{
    /**
     * 分类标签表
     *
     * @var string
     * @author Luoyan
     */
    protected $table = 'data_category_labels';

    /**
     * 课填充属性
     *
     * @var array
     * @author Luoyan
     */
    protected $fillable = ['category_label_name', 'status'];


    /**
     * 多对多关联关系 / 一个分类标签属于多个分类
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author: Luoyan
     */
    public function categorys()
    {
        return $this->belongsToMany(Category::class, 'rel_category_labels', 'category_label_id', 'category_id')->withTimestamps();
    }
}
