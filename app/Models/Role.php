<?php
namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Builder;

class Role extends SpatieRole {

    public const SUPER_ADMIN = 'superadmin';

    public function users2() {
        return $this->hasMany(User::class);
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // static::addGlobalScope('hide_super', function (Builder $builder) {
        //     $builder->where('name', '<>', self::SUPER_ADMIN);
        // });
    }
}
