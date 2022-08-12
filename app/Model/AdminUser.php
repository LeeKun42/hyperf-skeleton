<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
use HyperfExt\Auth\Authenticatable;
use HyperfExt\Auth\Contracts\AuthenticatableInterface;
use HyperfExt\Jwt\Contracts\JwtSubjectInterface;

/**
 * @property int $id 
 * @property string $ding_user_id 
 * @property string $mobile 
 * @property string $name 
 * @property string $passwd 
 * @property int $sex 
 * @property int $bk_org_id 
 * @property string $email 
 * @property int $status 
 * @property int $is_external_user 
 * @property int $is_builtin_user 
 * @property string $last_login_time 
 * @property string $last_login_ip 
 * @property int $is_bind 
 * @property string $job_number 
 * @property string $position 
 * @property int $leader_id 
 * @property string $entry_time 
 * @property int $is_init 
 * @property int $source 
 * @property int $is_show 
 * @property string $avatar 
 * @property string $create_time 
 * @property string $update_time 
 */
class AdminUser extends Model implements JwtSubjectInterface,AuthenticatableInterface
{
    use Authenticatable;

    public function getJwtCustomClaims(): array
    {
        return [
            'guard' => 'admin-api'    // 添加自定义信息
        ];
    }

    public function getJwtIdentifier()
    {
        return $this->getKey();
    }


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jjcc_admin_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function roles()
    {
        return $this->belongsToMany(AdminRole::class, 'jjcc_admin_user_role', 'user_id','role_id');
    }
}