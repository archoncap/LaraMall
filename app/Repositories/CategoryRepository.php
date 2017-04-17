<?php

namespace App\Repositories;

use App\Model\Category;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository
{

    /**
     * @var Category
     */
    protected $category;

    /**
     * 服务注入
     *
     * CategoryRepository constructor.
     * @param $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * 创建分类
     *
     * @param array $data
     * @return static
     * @author: Luoyan
     */
    public function createByCategory(array $data)
    {
        return $this->category->create($data);
    }

    /**
     * 分类搜索分页
     *
     * @param int $perPage
     * @param array $where
     * @return mixed
     * @author: Luoyan
     */
    public function categoryPaginate($perPage = 10, array $where = [])
    {
        return $this->category->withTrashed()->with('parentCategory')->where($where)->orderBy('created_at', 'desc')->paginate($perPage);
    }

    /**
     * 根据 id 查找数据 / 附带父类信息
     *
     * @param $id
     * @return mixed
     * @author: Luoyan
     */
    public function findByIdWithParent($id)
    {
        return $this->category->with('parentCategory')->find($id);
    }

    /**
     * 根据 id 查找数据
     *
     * @param $id
     * @return mixed
     * @author: Luoyan
     */
    public function findById($id)
    {
        return $this->category->find($id);
    }

    /**
     * 根据 Id 修改分类信息
     *
     * @param $id
     * @param array $data
     * @return mixed
     * @author: Luoyan
     */
    public function updateById($id, array $data)
    {
        return $this->category->where('id', $id)->update($data);
    }

    /**
     * 软删除一条数据
     *
     * @param $id
     * @return int
     * @author: Luoyan
     */
    public function softDeletes($id)
    {
        return $this->category->destroy($id);
    }

    /**
     * 恢复软删除的数据
     *
     * @param $id
     * @return mixed
     * @author: Luoyan
     */
    public function softRstore($id)
    {
        return $this->category->withTrashed()->where('id', $id)->restore();
    }

    /**
     * 获取分类
     *
     * @param $param
     * @author zhulinjie
     */
    public function select($where)
    {
        return $this->category->where($where)->get();
    }
}