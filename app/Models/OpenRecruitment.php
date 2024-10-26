<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OpenRecruitment extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'open_recruitment';
    protected $fillable = ['NIM', 'full_name', 'email', 'campus', 'ektm', 'follow', 'follow_dpc', 'cv', 'motivasi_bergabung', 'whatsapp', 'instagram', 'semester', 'status_interview'];
    public $timestamps = true;

    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
        });
    }

    public function campuses()
    {
        return $this->belongsTo(Campuses::class);
    }
}
