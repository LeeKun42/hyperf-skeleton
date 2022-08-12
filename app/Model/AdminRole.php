<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $id 
 * @property string $name 
 * @property string $desc 
 * @property string $create_time 
 * @property string $update_time 
 * @property int $status 
 * @property string $role_no 
 * @property int $is_default 
 * @property int $is_allow_login 
 * @property int $source 
 */
class AdminRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jjcc_admin_role';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'status' => 'integer', 'is_default' => 'integer', 'is_allow_login' => 'integer', 'source' => 'integer'];
}