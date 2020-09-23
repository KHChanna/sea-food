<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class OauthAccessToken extends Model
{
    //
    protected $table = 'oauth_access_tokens';
}
