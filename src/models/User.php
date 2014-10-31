<?php 
/**
 * Class User
 *
 * @author Jai beschi Jai@Jaibeschi.com
 */
use Jai\Authentication\Models\User as AuthUser;


class User extends AuthUser
{
        
    public function comment()
	{
		return $this->hasMany('Comment');
	}
} 